@extends('frontend.layout.index')

@section('content')

    <section class="hero" id="accueil">
    <div class="container">
        <div class="row align-items-center g-4 g-lg-5">
        <div class="col-lg-7 d-flex flex-column gap-4">
            <span class="stamp"><b>07:00</b> Ton briefing arrive avant toi</span>
            <h1 class="hero-title">{{ $settings['hero_title'] ?? '' }} <em>{{ $settings['hero_title_accent'] ?? '' }}</em></h1>
            <p class="lead-text">{{ $settings['hero_subtitle'] ?? ''}}</p>
                <div class="stores" data-section="hero">
        <a class="store store-android" href="https://play.google.com/store/apps/details?id=[app.matin]&amp;utm_source=site&amp;utm_medium=vitrine&amp;utm_content=hero" target="_blank" rel="noopener" data-store="android">
            <svg class="icon" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M6 3.5v17l14-8.5z" fill="currentColor" stroke="none"/></svg>        <span><small>Disponible sur</small><span class="store-name">Google Play</span></span>
                    <span class="qr-pop" aria-hidden="true"><span class="qr-box" data-qr="https://play.google.com/store/apps/details?id=[app.matin]&amp;utm_source=site&amp;utm_medium=vitrine&amp;utm_content=hero"></span><span>Scanne pour installer sur ton téléphone</span></span>
                </a>
                <a class="store store-ios store-soon" href="#beta" data-store="ios" data-soon="1">
            <span class="store-tag">Bientôt</span>
            <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><rect x="6" y="2" width="12" height="20" rx="3"/><path d="M10.5 18.5h3"/></svg>          <span><small>Bientôt sur</small><span class="store-name">App Store</span></span>
            </a>
            </div>
                <ul class="reassure list-unstyled">
            <li><svg class="icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M5 12l5 5 9-10"/></svg>Gratuit pour commencer</li>
            <li><svg class="icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M5 12l5 5 9-10"/></svg>Moins de 15 Mo</li>
            <li><svg class="icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M5 12l5 5 9-10"/></svg>En français</li>
            </ul>
            <div><a class="text-link" href="#beta">Rejoindre la bêta</a></div>
        </div>

        <div class="col-lg-5">
            <div class="hero-visual">
            <div class="hero-sun" aria-hidden="true"></div>
            <div class="hero-notif" aria-hidden="true">
                <span class="hero-notif-icon"><svg class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M4 17h16"/><path d="M7.5 17a4.5 4.5 0 0 1 9 0"/><path d="M12 7v2.5M5.5 10.5l1.5 1.5M18.5 10.5L17 12"/></svg></span>
                <div><b>Matin <span>07:00</span></b><p>3 RDV aujourd&#039;hui, 2 e-mails urgents. Premier RDV à 9h avec Koffi.</p></div>
            </div>
            <div class="phone">
                <img
                    src="{{ !empty($settings['hero_image'])
                        ? asset('storage/' . $settings['hero_image'])
                        : asset('assets/img/screens/accueil.webp') }}"
                    width="390"
                    height="844"
                    alt="Écran d'accueil de l'application Matin : résumé de la journée et bouton micro"
                    fetchpriority="high"
                >
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
    <div class="trust" aria-label="Garanties">
    <div class="container">
        <ul class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-3 list-unstyled mb-0">
            @foreach ($trustItems as $item)                
                <li class="col"><div class="trust-item"><x-icon :name="$item->icon" /><span>{{ $item->text }}</span></div></li>
            @endforeach
                {{-- <li class="col"><div class="trust-item"><svg class="icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M5 12l5 5 9-10"/></svg><span>Rien n&#039;est envoyé sans ta confirmation.</span></div></li>
                <li class="col"><div class="trust-item"><svg class="icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M2 20h3v-4H2zM8 20h3v-8H8zM14 20h3V8h-3zM20 20h2V4h-2z"/></svg><span>Fonctionne en 3G, même sur un petit téléphone.</span></div></li>
                <li class="col"><div class="trust-item"><svg class="icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><rect x="3" y="6" width="18" height="13" rx="2"/><path d="M3 10h18M7 15h4"/></svg><span>Paiement Mobile Money : Flooz, T-Money.</span></div></li> --}}
        </ul>
    </div>
    </div>
    <section class="section" id="comment">
    <div class="container">
        <div class="sec-head">
        <span class="eyebrow">{{ $settings['step_question'] ?? ''}}</span>
        <h2>{{ $settings['step_title'] ?? ''}}</h2>
        </div>
        <ol class="steps row g-0 list-unstyled">
            @foreach ($steps as $step)
                <li class="col-md-4 step">
                    <span class="step-num">{{$step->step}}</span>
                    <h3>{{$step->title}}</h3>
                    <p>{{$step->description}}</p>
                </li>
            @endforeach
{{--                 <li class="col-md-4 step">
            <span class="step-num">Étape 2</span>
            <h3>Choisis l&#039;heure de ton briefing</h3>
            <p>7h00 par défaut. Tu peux aussi activer un récap du soir.</p>
            </li>
                <li class="col-md-4 step">
            <span class="step-num">Étape 3</span>
            <h3>Reçois ta journée et parle à Matin</h3>
            <p>Un e-mail et une notification chaque matin, puis un seul bouton pour tout gérer à la voix.</p>
            </li> --}}
            </ol>
    </div>
    </section>
    <section class="section section-alt" id="fonctionnalites">
    <div class="container">
        <div class="sec-head">
        <span class="eyebrow">{{ $settings['feature_question'] ?? ''}}</span>
        <h2>{{ $settings['feature_title'] ?? ''}}</h2>
        <p>{{ $settings['feature_subtitle'] ?? ''}}</p>
        </div>
        <div class="features row row-cols-1 row-cols-md-2 row-cols-lg-3 g-0">
            @foreach ($features as $feature)
                <div class="col">
                    <article class="feature">
                        <span class="feature-icon"><x-icon :name="$feature->icon" /></span>
                        <h3>{{$feature->title}}</h3>
                        <p>{{$feature->description}}</p>
                    </article>
                </div>
            @endforeach
            {{-- <div class="col">
                <article class="feature">
                    <span class="feature-icon"><svg class="icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><rect x="9" y="2" width="6" height="12" rx="3"/><path d="M5 10v1a7 7 0 0 0 14 0v-1M12 18v4M8 22h8"/></svg></span>
                    <h3>Commande vocale</h3>
                                <p>Un seul bouton. Tu parles, Matin comprend et prépare l&#039;action.</p>
                </article>
            </div>
            <div class="col">
                <article class="feature">
                    <span class="feature-icon"><svg class="icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/></svg></span>
                    <h3>Réponses aux e-mails</h3>
                    <q>Réponds à Awa que je confirme pour jeudi</q>            <p>Un brouillon prêt, envoyé seulement si tu confirmes.</p>
                </article>
            </div>
            <div class="col">
                <article class="feature">
                    <span class="feature-icon"><svg class="icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><rect x="3" y="4" width="18" height="17" rx="2"/><path d="M3 9h18M8 2v4M16 2v4"/></svg></span>
                    <h3>Gestion de l&#039;agenda</h3>
                                <p>Créer, décaler ou annuler un rendez-vous, et prévenir les participants.</p>
                </article>
            </div>
            <div class="col">
                <article class="feature">
                    <span class="feature-icon"><svg class="icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.9 1.9 0 0 0 3.4 0"/></svg></span>
                    <h3>Rappels intelligents</h3>
                                <p>15 minutes avant chaque RDV, avec le contexte du dernier échange.</p>
                </article>
            </div>
            <div class="col">
                <article class="feature">
                    <span class="feature-icon"><svg class="icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M11 5L6 9H2v6h4l5 4z"/><path d="M15.5 8.5a5 5 0 0 1 0 7M19 5a10 10 0 0 1 0 14"/></svg></span>
                    <h3>Lecture à voix haute</h3>
                                <p>Écoute ton briefing en deux minutes, mains libres, sur la route ou en cuisine.</p>
                </article>
            </div> --}}
        </div>
    </div>
    </section>
@if($screenshots->isNotEmpty())
<section class="section" id="captures">
  <div class="container">
    <div class="sec-head">
      <span class="eyebrow">{{ $settings['screenshot_question'] ?? '' }}</span>
      <h2>{{ $settings['screenshot_title'] ?? '' }}</h2>
      <p>{{ $settings['screenshot_subtitle'] ?? '' }}</p>
    </div>

    <div class="row align-items-center g-4 g-lg-5">

      {{-- Colonne gauche : les onglets --}}
      <div class="col-lg-6 d-none d-lg-block">
        <div class="screen-tabs" role="tablist" aria-label="Écrans de l'application">
          @foreach($screenshots as $screenshot)
            <button type="button" @class(['screen-tab', 'active' => $loop->first]) role="tab"
                    aria-selected="{{ $loop->first ? 'true' : 'false' }}" aria-controls="ecransCarousel"
                    data-bs-target="#ecransCarousel" data-bs-slide-to="{{ $loop->index }}">
              <span class="screen-tab-num">{{ sprintf('%02d', $loop->iteration) }}</span>
              <span><b>{{ $screenshot->title }}</b><span class="d-block">{{ $screenshot->text }}</span></span>
            </button>
          @endforeach
        </div>
      </div>

      {{-- Colonne droite : le carrousel --}}
      <div class="col-lg-6">
        <div id="ecransCarousel" class="carousel slide screens-carousel" data-bs-touch="true" data-bs-interval="false" aria-roledescription="carrousel" aria-label="Captures d'écran">
          <div class="phone phone-lg">
            <div class="carousel-inner">
              @foreach($screenshots as $screenshot)
                <div @class(['carousel-item', 'active' => $loop->first]) aria-roledescription="diapositive"
                     aria-label="{{ $loop->iteration }} sur {{ $loop->count }}"
                     data-title="{{ $screenshot->title }}" data-text="{{ $screenshot->text }}">
                  <img src="{{ asset('storage/'.$screenshot->image) }}" width="390" height="844" loading="lazy" decoding="async"
                       alt="Capture de l'écran {{ $screenshot->title }} de l'application Matin">
                </div>
              @endforeach
            </div>
          </div>

          <div class="screen-caption d-lg-none" aria-live="polite">
            <b id="screenCapTitle">{{ $screenshots->first()->title }}</b>
            <span id="screenCapText">{{ $screenshots->first()->text }}</span>
          </div>

          <div class="carousel-controls">
            <button class="round-btn" type="button" data-bs-target="#ecransCarousel" data-bs-slide="prev" aria-label="Écran précédent"><svg class="icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M15 18l-6-6 6-6"/></svg></button>
            <div class="carousel-indicators screen-dots">
              @foreach($screenshots as $screenshot)
                <button type="button" data-bs-target="#ecransCarousel" data-bs-slide-to="{{ $loop->index }}"
                        @class(['active' => $loop->first]) @if($loop->first) aria-current="true" @endif
                        aria-label="Écran {{ $loop->iteration }} : {{ $screenshot->title }}"></button>
              @endforeach
            </div>
            <button class="round-btn" type="button" data-bs-target="#ecransCarousel" data-bs-slide="next" aria-label="Écran suivant"><svg class="icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M9 6l6 6-6 6"/></svg></button>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
@endif
    <section class="section section-dark" id="email">
    <div class="container">
        <div class="row g-4 g-lg-5 align-items-start">
        <div class="col-lg-5">
            <div class="sec-head mb-4">
            <span class="eyebrow">{{ $settings['morning_email_question'] ?? ''}}</span>
            <h2>{{ $settings['morning_email_title'] ?? ''}}</h2>
            <p>{{ $settings['morning_email_text'] ?? ''}}</p>
            </div>
            <ol class="mail-points list-unstyled">
                        <li><span class="mono">06:58</span><p><b>Matin lit</b> ton agenda du jour et les e-mails reçus pendant la nuit.</p></li>
                        <li><span class="mono">06:59</span><p><b>Matin trie</b> : ce qui est urgent, ce qui attend ta réponse, ce qui peut attendre.</p></li>
                        <li><span class="mono">07:00</span><p><b>Tu reçois</b> un e-mail court et une notification. Lecture : moins de 2 minutes.</p></li>
                    </ol>
        </div>
        <div class="col-lg-7">
            <figure class="mail-figure mb-0">
                <img src="{{!empty($settings['morning_email_image']) ? asset('storage/' . $settings['morning_email_image']) : asset('assets/img/email-briefing.webp')}}" width="600" height="927" loading="lazy" decoding="async"
                alt="Exemple d'e-mail de briefing reçu à 7h00 : agenda, e-mails à traiter en priorité, réponses en attente et rappel">
            </figure>
        </div>
        </div>
    </div>
    </section>
@if($voiceCommands->isNotEmpty())
    <section class="section" id="demo">
        <div class="container">
            <div class="sec-head">
            <span class="eyebrow">{{ $settings['voice_question'] ?? '' }}</span>
            <h2>{{ $settings['voice_title'] ?? '' }}</h2>
            <p>{{ $settings['voice_subtitle'] ?? '' }}</p>
            </div>
            <div class="row g-4 align-items-stretch">
            <div class="col-lg-5">
                <div class="demo-cmds" id="demoCmds">
                @foreach($voiceCommands as $command)
                    <button type="button" class="demo-cmd" aria-pressed="false" data-demo="{{ $loop->index }}">
                    <span class="demo-mic"><x-icon name="mic" size="18" /></span>
                    <span>« {{ $command->command }} »</span>
                    </button>
                @endforeach
                </div>
            </div>
            <div class="col-lg-7">
                <div class="demo-console">
                <div class="demo-head"><span class="demo-live" id="demoLive"><i></i><span id="demoLiveText">En attente</span></span><span>Matin</span></div>
                <div class="demo-conv" id="demoConv" aria-live="polite">
                    <div class="demo-empty">
                    <svg class="icon" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><rect x="9" y="2" width="6" height="12" rx="3"/><path d="M5 10v1a7 7 0 0 0 14 0v-1M12 18v4M8 22h8"/></svg>              <span>Choisis une commande pour lancer la démo.</span>
                    </div>
                </div>
                <p class="demo-note">Dans l'app, chaque action attend ton accord avant d'être exécutée.</p>
                </div>
            </div>
            </div>
        </div>
        <script type="application/json" id="demoData">@json($demo)</script>
    </section>
@endif
    {{-- <section class="section" id="demo">
        <div class="container">
            <div class="sec-head">
            <span class="eyebrow">{{ $settings['voice_question'] ?? ''}}</span>
            <h2>{{ $settings['voice_title'] ?? ''}}</h2>
            <p>{{ $settings['voice_subtitle'] ?? ''}}</p>
            </div>
            <div class="row g-4 align-items-stretch">
            <div class="col-lg-5">
                <div class="demo-cmds" id="demoCmds">
                            <button type="button" class="demo-cmd" aria-pressed="false" data-demo="0">
                    <span class="demo-mic"><svg class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><rect x="9" y="2" width="6" height="12" rx="3"/><path d="M5 10v1a7 7 0 0 0 14 0v-1M12 18v4M8 22h8"/></svg></span>
                    <span>« Qu&#039;est-ce que j&#039;ai aujourd&#039;hui ? »</span>
                    </button>
                            <button type="button" class="demo-cmd" aria-pressed="false" data-demo="1">
                    <span class="demo-mic"><svg class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><rect x="9" y="2" width="6" height="12" rx="3"/><path d="M5 10v1a7 7 0 0 0 14 0v-1M12 18v4M8 22h8"/></svg></span>
                    <span>« Réponds à Awa que je confirme pour jeudi »</span>
                    </button>
                            <button type="button" class="demo-cmd" aria-pressed="false" data-demo="2">
                    <span class="demo-mic"><svg class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><rect x="9" y="2" width="6" height="12" rx="3"/><path d="M5 10v1a7 7 0 0 0 14 0v-1M12 18v4M8 22h8"/></svg></span>
                    <span>« Décale ma réunion de 15h à demain matin »</span>
                    </button>
                            <button type="button" class="demo-cmd" aria-pressed="false" data-demo="3">
                    <span class="demo-mic"><svg class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><rect x="9" y="2" width="6" height="12" rx="3"/><path d="M5 10v1a7 7 0 0 0 14 0v-1M12 18v4M8 22h8"/></svg></span>
                    <span>« Rappelle-moi d&#039;appeler la banque à 14h »</span>
                    </button>
                        </div>
            </div>
            <div class="col-lg-7">
                <div class="demo-console">
                <div class="demo-head"><span class="demo-live" id="demoLive"><i></i><span id="demoLiveText">En attente</span></span><span>Matin</span></div>
                <div class="demo-conv" id="demoConv" aria-live="polite">
                    <div class="demo-empty">
                    <svg class="icon" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><rect x="9" y="2" width="6" height="12" rx="3"/><path d="M5 10v1a7 7 0 0 0 14 0v-1M12 18v4M8 22h8"/></svg>              <span>Choisis une commande pour lancer la démo.</span>
                    </div>
                </div>
                <p class="demo-note">Dans l'app, chaque action attend ton accord avant d'être exécutée.</p>
                </div>
            </div>
            </div>
        </div>
        <script type="application/json" id="demoData">[{"say":"Qu'est-ce que j'ai aujourd'hui ?","reply":"Tu as 3 rendez-vous : 9h00 réunion fournisseur avec Koffi, 13h00 déjeuner avec Awa, 16h30 appel avec la banque. Ton après-midi est libre entre 14h et 16h."},{"say":"Réponds à Awa que je confirme pour jeudi","reply":"Voici le brouillon. Je l'envoie ?","action":{"meta":"À : Awa Mensah · Objet : Re: Livraison jeudi","body":"Bonjour Awa, je te confirme la livraison pour jeudi. Merci et bonne journée. Afi","yes":"Envoyer","done":"E-mail envoyé à Awa Mensah."}},{"say":"Décale ma réunion de 15h à demain matin","reply":"Demain matin, tu es libre à 9h00 ou à 10h30. Je propose 10h30 et je préviens Kodjo ?","action":{"meta":"Réunion avec Kodjo","body":"Mercredi 15h00 → Jeudi 10h30, avec un message aux participants.","yes":"Décaler","done":"Réunion déplacée à jeudi 10h30. Kodjo est prévenu."}},{"say":"Rappelle-moi d'appeler la banque à 14h","reply":"D'accord. Je crée ce rappel ?","action":{"meta":"Rappel · aujourd'hui 14h00","body":"Appeler la banque pour les pièces du dossier.","yes":"Créer le rappel","done":"Rappel créé pour 14h00."}}]</script>
    </section> --}}
    <section class="section section-alt" id="vie-privee">
    <div class="container">
        <div class="sec-head">
        <span class="eyebrow">{{ $settings['security_question'] ?? ''}}</span>
        <h2>{{ $settings['security_title'] ?? ''}}</h2>
        <p>{{ $settings['security_intro'] ?? ''}}</p>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4 g-lg-5">
            @foreach ($securityPoints as $security)
                <div class="col"><div class="privacy-item"><h3>{{$security->title}}</h3><p>{{$security->description}}</p></div></div>
            @endforeach
{{--                 <div class="col"><div class="privacy-item"><h3>Accès limité</h3><p>Lecture de l&#039;agenda et des e-mails récents. L&#039;envoi ne se fait qu&#039;après ta confirmation.</p></div></div>
                <div class="col"><div class="privacy-item"><h3>Pas d&#039;archive de tes e-mails</h3><p>Le contenu complet n&#039;est pas conservé : seulement des résumés courts pour ton briefing.</p></div></div>
                <div class="col"><div class="privacy-item"><h3>Données chiffrées</h3><p>Les accès sont chiffrés sur nos serveurs et en transit.</p></div></div>
                <div class="col"><div class="privacy-item"><h3>Révocable à tout moment</h3><p>Coupe l&#039;accès depuis l&#039;app ou ton compte Google, et supprime ton compte en un clic.</p></div></div>
                <div class="col"><div class="privacy-item"><h3>Jamais vendues</h3><p>Tes données ne servent ni à la publicité ni à d&#039;autres entreprises.</p></div></div> --}}
            </div>
        <p class="mt-5 mb-0"><a class="text-link" href="{{route('confidentialite')}}">Lire la politique de confidentialité</a></p>
    </div>
    </section>
    <section class="section" id="tarifs">
    <div class="container">
        <div class="sec-head">
        <span class="eyebrow">{{ $settings['tarif_question'] ?? ''}}</span>
        <h2>{{ $settings['tarif_title'] ?? ''}}</h2>
        </div>

        <div class="billing-toggle" role="group" aria-label="Période de facturation">
        <button type="button" aria-pressed="true" data-billing="monthly">Mensuel</button>
        <button type="button" aria-pressed="false" data-billing="yearly">Annuel <em>2 mois offerts</em></button>
        </div>

        <div class="row g-4 align-items-stretch">
            @foreach($plans as $plan)
                <div class="col-lg-4">
                    <article @class(['plan', 'plan-featured' => $plan->is_featured])>
                        @if($plan->is_featured && $plan->badge)<span class="plan-badge">{{ $plan->badge }}</span>@endif
                        <h3>{{ $plan->name }}</h3>
                        <p class="plan-desc">{{ $plan->description }}</p>
                        <div class="plan-price"
                            data-monthly="{{ number_format($plan->price_monthly, 0, ',', ' ') }}"
                            data-yearly="{{ number_format($plan->price_yearly ?? $plan->price_monthly, 0, ',', ' ') }}"
                            data-has-yearly="{{ $plan->price_yearly !== null ? 1 : 0 }}">
                        <b class="amount">{{ number_format($plan->price_monthly, 0, ',', ' ') }}</b>
                        <span class="period">{{ $plan->period }}</span>
                        <small class="note"></small>
                        </div>
                        <ul class="list-unstyled plan-list">
                        @foreach($plan->features as $feature)
                            <li><x-icon name="check" size="16" stroke="2.6" />{{ $feature }}</li>
                        @endforeach
                        </ul>
                        <a class="btn {{ $plan->is_featured ? 'btn-accent' : 'btn-outline-ink' }} w-100" href="{{ $plan->cta_url }}" data-track="clic_offre" data-plan="{{ Str::slug($plan->name) }}">{{ $plan->cta_label }}</a>
                    </article>
                </div>
            @endforeach
         </div>

        <div class="pay-methods">Paiement sans engagement :
            @foreach(array_filter(array_map('trim', explode(',', $settings['pay_methods'] ?? ''))) as $method)
                <span>{{ $method }}</span>
            @endforeach    </div>
    </div>
    </section>
    <section class="section" id="faq">
    <div class="container">
        <div class="row g-4 g-lg-5">
        <div class="col-lg-5">
            <div class="sec-head mb-0">
            <span class="eyebrow">{{ $settings['faq_question'] ?? ''}}</span>
            <h2>{{ $settings['faq_title'] ?? ''}}</h2>
            <p>Une autre question ? <a href="contact.html">Écris-nous</a> ou contacte le support sur WhatsApp.</p>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="accordion faq-accordion" id="faqAccordion">
                @foreach ($faqs as $index => $faq)    
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="faq-h{{ $index }}">
                            <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-c{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="faq-c{{ $index }}">
                            {{$faq->question}}               </button>
                        </h3>
                        <div id="faq-c{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="faq-h{{ $index }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">{{$faq->answer}}</div>
                        </div>
                    </div>
                @endforeach
            {{--     <div class="accordion-item">
                    <h3 class="accordion-header" id="faq-h1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq-c1" aria-expanded="false" aria-controls="faq-c1" data-faq="2">
                        Est-ce que Matin lit tous mes e-mails ?                </button>
                    </h3>
                    <div id="faq-c1" class="accordion-collapse collapse" aria-labelledby="faq-h1" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">Matin analyse tes e-mails récents pour en tirer un résumé. Le contenu complet n&#039;est pas conservé sur nos serveurs, seulement les résumés de ton briefing.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h3 class="accordion-header" id="faq-h2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq-c2" aria-expanded="false" aria-controls="faq-c2" data-faq="3">
                        Ça marche avec Outlook ou Yahoo ?                </button>
                    </h3>
                    <div id="faq-c2" class="accordion-collapse collapse" aria-labelledby="faq-h2" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">Pas encore. Matin fonctionne aujourd&#039;hui avec Gmail et Google Agenda. D&#039;autres services suivront.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h3 class="accordion-header" id="faq-h3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq-c3" aria-expanded="false" aria-controls="faq-c3" data-faq="4">
                        Est-ce que ça consomme beaucoup de données ?                </button>
                    </h3>
                    <div id="faq-c3" class="accordion-collapse collapse" aria-labelledby="faq-h3" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">Non. L&#039;application pèse moins de 15 Mo et le travail lourd se fait sur nos serveurs. Elle reste utilisable en 3G.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h3 class="accordion-header" id="faq-h4">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq-c4" aria-expanded="false" aria-controls="faq-c4" data-faq="5">
                        Comment je paie l&#039;abonnement ?                </button>
                    </h3>
                    <div id="faq-c4" class="accordion-collapse collapse" aria-labelledby="faq-h4" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">Par Mobile Money (Flooz, T-Money) ou par carte bancaire, sans engagement. Tu peux arrêter quand tu veux.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h3 class="accordion-header" id="faq-h5">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq-c5" aria-expanded="false" aria-controls="faq-c5" data-faq="6">
                        Comment supprimer mon compte et mes données ?                </button>
                    </h3>
                    <div id="faq-c5" class="accordion-collapse collapse" aria-labelledby="faq-h5" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">Depuis les réglages de l&#039;app, ou sur la page « Supprimer mon compte » du site. Tes données sont effacées et l&#039;accès à Google est révoqué.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h3 class="accordion-header" id="faq-h6">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq-c6" aria-expanded="false" aria-controls="faq-c6" data-faq="7">
                        L&#039;application existe sur iPhone ?                </button>
                    </h3>
                    <div id="faq-c6" class="accordion-collapse collapse" aria-labelledby="faq-h6" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">Bientôt. Inscris-toi à la bêta pour être prévenu de la sortie sur l&#039;App Store.</div>
                    </div>
                </div> --}}
            </div>
        </div>
        </div>
    </div>
    </section>
@php
    $play       = $settings['hero_playstore_url'] ?? '';
    $apple      = $settings['hero_appstore_url'] ?? '';
    $playReady  = $play !== '' && $play !== '#';
    $appleReady = $apple !== '' && $apple !== '#';
@endphp


<section class="section section-cta" id="telecharger">
  <div class="container">
    <div class="row g-4 g-lg-5 align-items-center">

      <div class="col-lg-7 d-flex flex-column gap-4">
        <span class="eyebrow">{{ $settings['action_question'] ?? '' }}</span>
        <h2 class="cta-title">{{ $settings['action_title'] ?? '' }}</h2>

        <div class="stores" data-section="final">
            <a class="store store-android" href="https://play.google.com/store/apps/details?id=[app.matin]&amp;utm_source=site&amp;utm_medium=vitrine&amp;utm_content=final" target="_blank" rel="noopener" data-store="android">
                <svg class="icon" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M6 3.5v17l14-8.5z" fill="currentColor" stroke="none"/></svg>        <span><small>Disponible sur</small><span class="store-name">Google Play</span></span>
            </a>
            <a class="store store-ios store-soon" href="#beta" data-store="ios" data-soon="1">
                <span class="store-tag">Bientôt</span>
                <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><rect x="6" y="2" width="12" height="20" rx="3"/><path d="M10.5 18.5h3"/></svg>          <span><small>Bientôt sur</small><span class="store-name">App Store</span></span>
            </a>
        </div>
        <div class="qr-card d-none d-lg-flex">
          <span class="qr-box" data-qr="https://play.google.com/store/apps/details?id=[app.matin]&amp;utm_source=site&amp;utm_medium=vitrine&amp;utm_content=qr" data-qr-size="4"></span>
          <p class="mb-0"><b>Sur ordinateur ?</b>Scanne ce code avec ton téléphone Android pour ouvrir la fiche Google Play.</p>
        </div>
    </div>

      <div class="col-lg-5">
        <form class="beta-form" id="beta" action="{{ route('beta.signup') }}" method="post" data-form="beta" novalidate data-ajax-form>
          @csrf
          <h3>Rejoindre la bêta</h3>
          <p class="form-intro">Sois prévenu à la sortie sur iPhone et des nouvelles fonctions.</p>

          @if(session('success'))
            <div class="alert alert-success" role="status">{{ session('success') }}</div>
          @endif
          <div class="form-alert alert alert-danger" role="status" hidden></div>

          <div>
            <label class="form-label" for="beta-prenom">Prénom</label>
            <input class="form-control @error('prenom') is-invalid @enderror" type="text" id="beta-prenom" name="prenom" value="{{ old('prenom') }}" autocomplete="given-name" maxlength="60" required placeholder="Afi">
            <div class="invalid-feedback" data-error-for="prenom">{{ $errors->first('prenom') }}</div>
          </div>

          <div>
            <label class="form-label" for="beta-contact">Adresse e-mail</label>
            <input class="form-control @error('email') is-invalid @enderror" type="text" id="beta-email" name="email" value="{{ old('email') }}" maxlength="120" required placeholder="afi@exemple.com">
            <div class="invalid-feedback" data-error-for="email">{{ $errors->first('email') }}</div>
          </div>

          <fieldset>
            <legend class="form-label">Ton téléphone</legend>
            <div class="choice-row">
              <input class="btn-check" type="radio" name="os" id="beta-os-android" value="android" @checked(old('os', 'android') === 'android')>
              <label class="btn btn-choice" for="beta-os-android">Android</label>
              <input class="btn-check" type="radio" name="os" id="beta-os-ios" value="ios" @checked(old('os') === 'ios')>
              <label class="btn btn-choice" for="beta-os-ios">iPhone</label>
            </div>
          </fieldset>

          <div class="form-check">
            <input class="form-check-input @error('consent') is-invalid @enderror" type="checkbox" id="beta-consent" name="consent" value="1" required>
            <label class="form-check-label" for="beta-consent">J'accepte de recevoir des nouvelles de Matin. Désinscription en un clic.</label>
            <div class="invalid-feedback" data-error-for="consent">{{ $errors->first('consent') }}</div>
          </div>

          {{-- Anti-spam : champ invisible pour les humains --}}
          <div class="hp-field" aria-hidden="true"><label for="beta-site">Site web</label><input type="text" id="beta-site" name="site_web" tabindex="-1" autocomplete="off"></div>

          <button class="btn btn-accent w-100" type="submit"><span class="btn-label">M'inscrire</span></button>
          <p class="form-small mb-0">Tes données servent uniquement à te prévenir. <a href="{{ route('confidentialite') }}">Confidentialité</a></p>
        </form>
      </div>

    </div>
  </div>
</section>

@endsection