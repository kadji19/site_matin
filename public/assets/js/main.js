/* ==========================================================================
   Matin — scripts du site vitrine (sans dépendance autre que Bootstrap)
   ========================================================================== */
(function () {
  'use strict';

  var $ = function (s, r) { return (r || document).querySelector(s); };
  var $$ = function (s, r) { return Array.prototype.slice.call((r || document).querySelectorAll(s)); };
  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var CONSENT_KEY = 'matin-consentement';

  /* ---------- Stockage local protégé (navigation privée, blocage) ---------- */
  function storeGet(k) { try { return window.localStorage.getItem(k); } catch (e) { return null; } }
  function storeSet(k, v) { try { window.localStorage.setItem(k, v); } catch (e) { /* ignoré */ } }

  /* ---------- Mesure d'audience ---------- */
  var CFG = window.MATIN_CONFIG || {};
  var analytics = { provider: (CFG.analytics && CFG.analytics.provider) || 'none', id: (CFG.analytics && CFG.analytics.id) || '', loaded: false };

  function loadAnalytics() {
    if (analytics.loaded || !analytics.id) return;
    var s = document.createElement('script');
    s.defer = true;
    if (analytics.provider === 'plausible') {
      s.src = 'https://plausible.io/js/script.js';
      s.setAttribute('data-domain', analytics.id);
      window.plausible = window.plausible || function () { (window.plausible.q = window.plausible.q || []).push(arguments); };
    } else if (analytics.provider === 'ga4') {
      s.src = 'https://www.googletagmanager.com/gtag/js?id=' + encodeURIComponent(analytics.id);
      window.dataLayer = window.dataLayer || [];
      window.gtag = function () { window.dataLayer.push(arguments); };
      window.gtag('js', new Date());
      window.gtag('config', analytics.id, { anonymize_ip: true });
    } else { return; }
    document.head.appendChild(s);
    analytics.loaded = true;
  }

  /** Événement de mesure : track('clic_store_android', { section: 'hero' }) */
  function track(name, props) {
    props = props || {};
    if (window.plausible && analytics.provider === 'plausible') window.plausible(name, { props: props });
    if (window.gtag && analytics.provider === 'ga4') window.gtag('event', name, props);
    if (window.console && /^(localhost|127\.0\.0\.1)$/.test(location.hostname)) console.log('[mesure]', name, props);
  }
  window.matinTrack = track;

  /* ---------- Bandeau cookies ---------- */
  var banner = $('#cookieBanner');
  var consent = storeGet(CONSENT_KEY);
  if (consent === 'yes') loadAnalytics();
  if (banner && !consent && analytics.provider !== 'none') {
    banner.hidden = false;
    document.body.classList.add('has-cookie-banner');
  }
  $$('[data-consent]').forEach(function (b) {
    b.addEventListener('click', function () {
      storeSet(CONSENT_KEY, b.dataset.consent);
      banner.hidden = true;
      document.body.classList.remove('has-cookie-banner');
      if (b.dataset.consent === 'yes') loadAnalytics();
    });
  });

  /* ---------- Toast ---------- */
  function toast(msg) {
    var el = $('#siteToast');
    if (!el || !window.bootstrap) return;
    $('#siteToastBody').textContent = msg;
    window.bootstrap.Toast.getOrCreateInstance(el, { delay: 3500 }).show();
  }

  /* ---------- En-tête : ombre au défilement + lien actif ---------- */
  var header = $('.site-header');
  if (header) {
    var onScroll = function () { header.classList.toggle('is-scrolled', window.scrollY > 20); };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }
  var spyLinks = $$('[data-spy]');
  if (spyLinks.length && 'IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        if (!en.isIntersecting) return;
        spyLinks.forEach(function (a) { a.classList.toggle('active', a.dataset.spy === en.target.id); });
      });
    }, { rootMargin: '-45% 0px -50% 0px' });
    spyLinks.forEach(function (a) { var t = document.getElementById(a.dataset.spy); if (t) io.observe(t); });
  }
  // Fermer le menu mobile au clic sur un lien
  $$('#menuMobile a').forEach(function (a) {
    a.addEventListener('click', function () {
      var oc = window.bootstrap && window.bootstrap.Offcanvas.getInstance($('#menuMobile'));
      if (oc) oc.hide();
    });
  });

  /* ---------- Boutons stores : appareil détecté + mesure ---------- */
  var ua = navigator.userAgent || '';
  var isAndroid = /android/i.test(ua);
  var isIOS = /iphone|ipad|ipod/i.test(ua) || (navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1);
  $$('.stores').forEach(function (group) {
    if (isAndroid) { var a = $('.store-android', group); if (a) a.classList.add('is-recommended'); }
    if (isIOS) { var i = $('.store-ios', group); if (i) { group.insertBefore(i, group.firstChild); i.classList.add('is-recommended'); } }
  });
  $$('.store').forEach(function (s) {
    s.addEventListener('click', function () {
      var section = s.closest('.stores') ? s.closest('.stores').dataset.section : '';
      track(s.dataset.store === 'ios' ? 'clic_store_ios' : 'clic_store_android', { section: section });
      if (s.dataset.soon) { var r = $('#beta-os-ios'); if (r) r.checked = true; }
    });
  });
  $$('[data-track]').forEach(function (el) {
    el.addEventListener('click', function () { track(el.dataset.track, el.dataset.plan ? { offre: el.dataset.plan } : {}); });
  });

  /* ---------- QR codes (bibliothèque qrcode-generator, locale) ---------- */
  function drawQr() {
    if (typeof window.qrcode !== 'function') return;
    $$('[data-qr]').forEach(function (box) {
      if (!box.dataset.qr || box.firstChild) return;
      try {
        var q = window.qrcode(0, 'M');
        q.addData(box.dataset.qr);
        q.make();
        box.innerHTML = q.createSvgTag({ cellSize: parseInt(box.dataset.qrSize || '4', 10), margin: 0, scalable: true });
        var svg = box.querySelector('svg');
        if (svg) { svg.setAttribute('role', 'img'); svg.setAttribute('aria-label', 'QR code vers la fiche Google Play'); }
      } catch (e) { /* lien trop long ou bibliothèque absente : on laisse vide */ }
    });
  }
  drawQr();

  /* ---------- Carrousel des captures : onglets + légende ---------- */
/*   var carousel = $('#ecransCarousel');
  if (carousel) {
    var tabs = $$('.screen-tab');
    var capTitle = $('#screenCapTitle'), capText = $('#screenCapText');
    carousel.addEventListener('slide.bs.carousel', function (ev) {
      tabs.forEach(function (t, k) { t.classList.toggle('active', k === ev.to); t.setAttribute('aria-selected', k === ev.to ? 'true' : 'false'); });
      var t = tabs[ev.to];
      if (t && capTitle) { capTitle.textContent = $('b', t).textContent; capText.textContent = $('span span', t).textContent; }
    });
  } */

const carousel = document.getElementById('ecransCarousel');

carousel.addEventListener('slide.bs.carousel', (e) => {
  const item = e.relatedTarget;
  document.getElementById('screenCapTitle').textContent = item.dataset.title;
  document.getElementById('screenCapText').textContent = item.dataset.text;

  document.querySelectorAll('.screen-tab').forEach((tab, i) => {
    tab.classList.toggle('active', i === e.to);
    tab.setAttribute('aria-selected', i === e.to);
  });
});

  /* ---------- Démo vocale simulée ---------- */
  var demoData = $('#demoData');
  if (demoData) {
    var cmds = JSON.parse(demoData.textContent);
    var conv = $('#demoConv'), live = $('#demoLive'), liveText = $('#demoLiveText');
    var run = 0;
    var wait = function (ms) { return new Promise(function (r) { setTimeout(r, reduceMotion ? 0 : ms); }); };
    var el = function (tag, cls, text) { var n = document.createElement(tag); if (cls) n.className = cls; if (text != null) n.textContent = text; return n; };

    $$('.demo-cmd').forEach(function (btn) {
      btn.addEventListener('click', function () { play(parseInt(btn.dataset.demo, 10), btn); });
    });

    var play = async function (i, btn) {
      var id = ++run, c = cmds[i];
      track('demo_vocale', { commande: i + 1 });
      $$('.demo-cmd').forEach(function (b) { b.setAttribute('aria-pressed', b === btn ? 'true' : 'false'); });
      conv.innerHTML = '';
      live.classList.add('is-on'); liveText.textContent = 'Écoute…';
      var me = el('div', 'bubble bubble-me'); conv.appendChild(me);
      for (var k = 1; k <= c.say.length; k++) { if (id !== run) return; me.textContent = c.say.slice(0, k); await wait(22); }
      liveText.textContent = 'Matin réfléchit…';
      await wait(600); if (id !== run) return;
      live.classList.remove('is-on'); liveText.textContent = 'Réponse';
      var ai = el('div', 'bubble bubble-ai'); ai.appendChild(el('b', null, 'Matin')); ai.appendChild(el('span', null, c.reply)); conv.appendChild(ai);
      if (!c.action) return;
      var a = el('div', 'demo-action');
      a.appendChild(el('span', 'meta', c.action.meta));
      a.appendChild(el('span', 'body', c.action.body));
      var acts = el('div', 'acts');
      var yes = el('button', 'btn btn-accent', c.action.yes); yes.type = 'button';
      var edit = el('button', 'btn btn-outline-ink', 'Modifier'); edit.type = 'button';
      var no = el('button', 'btn btn-outline-ink', 'Annuler'); no.type = 'button';
      acts.appendChild(yes); acts.appendChild(edit); acts.appendChild(no); a.appendChild(acts);
      conv.appendChild(a);
      yes.addEventListener('click', function () {
        a.classList.add('is-done');
        var res = el('div', 'result'); res.innerHTML = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" aria-hidden="true"><path d="M5 12l5 5 9-10"/></svg>';
        res.appendChild(el('span', null, c.action.done + ' (démo : rien n’est réellement envoyé)'));
        acts.replaceWith(res);
      });
      edit.addEventListener('click', function () { toast('Dans l’app, tu modifies le brouillon à la voix ou au clavier.'); });
      no.addEventListener('click', function () { a.innerHTML = ''; a.appendChild(el('span', 'meta', 'Action annulée. Rien n’a été envoyé.')); });
    };
  }

  /* ---------- Tarifs : mensuel / annuel ---------- */
  $$('[data-billing]').forEach(function (b) {
    b.addEventListener('click', function () {
      var yearly = b.dataset.billing === 'yearly';
      $$('[data-billing]').forEach(function (x) { x.setAttribute('aria-pressed', x === b ? 'true' : 'false'); });
      $$('.plan-price').forEach(function (p) {
        var free = p.dataset.monthly === '0';
        var useYear = yearly && p.dataset.hasYearly === '1';
        $('.amount', p).textContent = useYear ? p.dataset.yearly : p.dataset.monthly;
        var cur = $('.period', p).textContent.split(' ')[0];
        $('.period', p).textContent = free ? cur : cur + (useYear ? ' / an' : ' / mois');
        $('.note', p).textContent = useYear ? 'Soit 2 mois offerts' : '';
      });
      track('tarif_bascule', { periode: yearly ? 'annuel' : 'mensuel' });
    });
  });

  /* ---------- FAQ : mesure des ouvertures ---------- */
  $$('[data-faq]').forEach(function (b) {
    b.addEventListener('click', function () { if (b.getAttribute('aria-expanded') === 'true') track('faq_ouverture', { question: b.dataset.faq }); });
  });

  /* ---------- Copier (e-mail, WhatsApp) ---------- */
  $$('[data-copy]').forEach(function (b) {
    b.addEventListener('click', function () {
      var target = document.getElementById(b.dataset.copy);
      if (!target) return;
      var txt = target.textContent.trim();
      var fallback = function () {
        var r = document.createRange(); r.selectNodeContents(target);
        var s = window.getSelection(); s.removeAllRanges(); s.addRange(r);
        toast('Texte sélectionné : copie-le avec Ctrl+C.');
      };
      if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(txt).then(function () { toast('Copié : ' + txt); }, fallback);
      } else { fallback(); }
    });
  });

  /* ---------- Formulaires : validation + envoi sans rechargement ---------- */
  var emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
  var phoneRe = /^\+?[\d\s.\-]{8,20}$/;

  function setError(form, name, msg) {
    var field = form.elements[name];
    var fb = form.querySelector('[data-error-for="' + name + '"]');
    if (field && field.classList) field.classList.toggle('is-invalid', !!msg);
    if (fb) fb.textContent = msg || '';
  }

  function validate(form) {
    var errors = {};
    $$('[required]', form).forEach(function (f) {
      var v = (f.type === 'checkbox') ? f.checked : f.value.trim();
      if (!v) errors[f.name] = f.type === 'checkbox' ? 'Coche cette case pour continuer.' : 'Ce champ est obligatoire.';
    });
    if (form.elements.contact && form.elements.contact.value.trim() && !errors.contact) {
      var c = form.elements.contact.value.trim();
      if (!emailRe.test(c) && !(phoneRe.test(c) && c.replace(/\D/g, '').length >= 8)) errors.contact = 'Entre un e-mail valide ou un numéro avec au moins 8 chiffres.';
    }
    if (form.elements.email && form.elements.email.value.trim() && !emailRe.test(form.elements.email.value.trim())) errors.email = 'Entre une adresse e-mail valide.';
    if (form.elements.message && form.elements.message.value.trim() && form.elements.message.value.trim().length < 10) errors.message = "Écris un message d'au moins 10 caractères.";
    return errors;
  }

  function successMessage(kind, form) {
    var v = function (n) { return form.elements[n] ? String(form.elements[n].value || '').trim() : ''; };
    if (kind === 'beta') {
      var c = v('contact'), ios = form.querySelector('input[name=os]:checked');
      var who = v('prenom') ? 'Merci ' + v('prenom') + ', tu es inscrit.' : 'Merci, tu es inscrit.';
      if (ios && ios.value === 'ios') return who + ' On te prévient dès la sortie sur iPhone.';
      return who + ' Tu recevras le lien de la bêta par e-mail.';
      /* return who + ' Tu recevras le lien de la bêta ' + (emailRe.test(c) ? 'par e-mail.' : 'sur WhatsApp.'); */
    }
    if (kind === 'contact') return 'Merci' + (v('nom') ? ' ' + v('nom') : '') + ', ton message est bien envoyé. Nous te répondons sous 48 heures ouvrées.';
    if (kind === 'suppression') return "Demande enregistrée. Nous t'écrivons à " + v('email') + ' pour confirmer, puis ton compte et tes données sont supprimés sous 30 jours.';
    return 'Merci, c\u2019est envoyé.';
  }

  $$('form[data-ajax-form]').forEach(function (form) {
    var alertBox = $('.form-alert', form);
    var showAlert = function (ok, msg) {
      alertBox.hidden = false;
      alertBox.className = 'form-alert alert ' + (ok ? 'alert-success' : 'alert-danger');
      alertBox.textContent = msg;
    };
    $$('input, textarea, select', form).forEach(function (f) {
      f.addEventListener('input', function () { if (f.name) setError(form, f.name, ''); });
      f.addEventListener('change', function () { if (f.name) setError(form, f.name, ''); });
    });

    form.addEventListener('submit', function (ev) {
      ev.preventDefault();
      $$('[data-error-for]', form).forEach(function (fb) { setError(form, fb.dataset.errorFor, ''); });
      var errors = validate(form);
      var names = Object.keys(errors);
      if (names.length) {
        names.forEach(function (n) { setError(form, n, errors[n]); });
        var first = form.elements[names[0]]; if (first && first.focus) first.focus();
        return;
      }

      var kind = form.dataset.form;
      var data = new FormData(form);
      var isBot = !!data.get('site_web');
      data.delete('site_web');
      data.append('formulaire', kind);
      data.append('page', location.pathname);

      var endpoint = (CFG.forms && CFG.forms[kind]) || '';
      if (!endpoint) {
        showAlert(false, "Ce formulaire n'est pas encore activé. En attendant, écris-nous à " + (CFG.supportEmail || 'notre adresse de support') + '.');
        alertBox.className = 'form-alert alert alert-warning';
        return;
      }
      if (isBot) { showAlert(true, successMessage(kind, form)); form.reset(); return; }

      var btn = $('button[type=submit]', form);
      btn.disabled = true; btn.classList.add('is-loading');
      fetch(endpoint, { method: 'POST', body: data, headers: { Accept: 'application/json' } })
        .then(function (r) {
          if (!r.ok) throw new Error('HTTP ' + r.status);
          showAlert(true, successMessage(kind, form));
          var keepOs = form.querySelector('input[name=os]:checked');
          form.reset(); if (keepOs) keepOs.checked = true;
          track(kind === 'beta' ? 'inscription_beta' : 'formulaire_' + kind);
        })
        .catch(function () { showAlert(false, "L'envoi n'a pas abouti. Vérifie ta connexion puis réessaie, ou écris-nous à " + (CFG.supportEmail || 'notre adresse de support') + '.'); })
        .then(function () { btn.disabled = false; btn.classList.remove('is-loading'); });
    });
  });
})();
