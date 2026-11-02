<footer class="site-footer" id="pied">
  <div class="container">
    <div class="row g-4 g-lg-5">
      <div class="col-12 col-lg-5 d-flex flex-column gap-3">
        <img src="assets/img/logo-blanc.svg" width="128" height="34" alt="Matin">
        <p class="mb-0">L'assistante vocale qui prépare ta journée. Conçue à Lomé.</p>
        <div class="copy-line"><span>Support :</span><code id="contact-email">{{ $settings['company_email'] ?? '' }}</code>{{-- <button type="button" class="btn-copy" data-copy="contact-email">Copier</button> --}}</div>
        <div class="copy-line"><span>WhatsApp :</span><code id="contact-wa">{{$settings['company_phone']?? ''}}</code>{{-- <button type="button" class="btn-copy" data-copy="contact-wa">Copier</button> --}}</div>
      </div>
      <div class="col-6 col-lg-2">
        <h2 class="footer-title">Produit</h2>
        <ul class="list-unstyled footer-links">
          <li><a href="{{route('home')}}#fonctionnalites">Fonctionnalités</a></li>
          <li><a href="{{route('home')}}#tarifs">Tarifs</a></li>
          <li><a href="{{route('home')}}#faq">FAQ</a></li>
          <li><a href="{{route('home')}}#telecharger">Télécharger</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-3">
        <h2 class="footer-title">Légal</h2>
        <ul class="list-unstyled footer-links">
          <li><a href="{{route('confidentialite')}}">Politique de confidentialité</a></li>
          <li><a href="{{route('conditions')}}">Conditions d'utilisation</a></li>
          <li><a href="{{route('mentions-legales')}}">Mentions légales</a></li>
          <li><a href="{{route('supprimer-compte')}}">Supprimer mon compte</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2">
        <h2 class="footer-title">Contact</h2>
        <ul class="list-unstyled footer-links">
          <li><a href="{{route('contact')}}">Nous écrire</a></li>
          <li><a href="https://wa.me/{{ preg_replace('/\D/', '', $settings['company_phone'] ?? '') }}?text={{ urlencode('Bonjour, je souhaite avoir des informations sur Matin.') }}" target="_blank" rel="noopener">WhatsApp</a></li>
         </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© 2026 [Nom de la société] · Lomé, Togo</span>
      <span>Matin n'est pas affilié à Google. Gmail et Google Agenda sont des marques de Google LLC.</span>
    </div>
  </div>
</footer>