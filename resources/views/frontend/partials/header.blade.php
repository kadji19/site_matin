<header class="site-header sticky-top" id="haut">
  <nav class="navbar navbar-expand-lg" aria-label="Navigation principale">
    <div class="container">
      <a class="navbar-brand brand" href="{{route('home')}}" aria-label="Matin, accueil">
        <img src="assets/img/logo-icon.svg" width="34" height="34" alt="">
        <span>Matin</span>
      </a>

      <button class="navbar-toggler menu-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuMobile" aria-controls="menuMobile" aria-label="Ouvrir le menu">
        <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M4 7h16M4 12h16M4 17h16"/></svg>      </button>

      <div class="offcanvas offcanvas-end" tabindex="-1" id="menuMobile" aria-labelledby="menuMobileTitre">
        <div class="offcanvas-header">
          <span class="brand offcanvas-title" id="menuMobileTitre">
            <img src="assets/img/logo-icon.svg" width="30" height="30" alt="">Matin          </span>
          <button type="button" class="menu-btn" data-bs-dismiss="offcanvas" aria-label="Fermer le menu"><svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M6 6l12 12M18 6L6 18"/></svg></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav ms-lg-auto me-lg-4 gap-lg-4">
                          <li class="nav-item"><a class="nav-link" href="{{route('home')}}#fonctionnalites" data-spy="fonctionnalites">Fonctionnalités</a></li>
                          <li class="nav-item"><a class="nav-link" href="{{route('home')}}#comment" data-spy="comment">Comment ça marche</a></li>
                          <li class="nav-item"><a class="nav-link" href="{{route('home')}}#tarifs" data-spy="tarifs">Tarifs</a></li>
                          <li class="nav-item"><a class="nav-link" href="{{route('home')}}#faq" data-spy="faq">FAQ</a></li>
                      </ul>
          <a class="btn btn-accent" href="{{route('home')}}#telecharger">Télécharger</a>
        </div>
      </div>
    </div>
  </nav>
</header>