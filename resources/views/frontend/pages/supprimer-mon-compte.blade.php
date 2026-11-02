@extends('frontend.layout.index')

@section('content')

  <section class="page-hero">
    <div class="container">
      <nav aria-label="Fil d'Ariane"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="{{route('home')}}">Accueil</a></li><li class="breadcrumb-item active" aria-current="page">Supprimer mon compte</li></ol></nav>
      <h1>Supprimer mon compte</h1>
      <p class="page-intro">Tu peux supprimer ton compte Matin et toutes tes données à tout moment.</p>          </div>
  </section>
  <div class="container page-body">
    <div class="row g-4 g-lg-5">
    <article class="col-lg-6 legal">
        <h2>Depuis l'application (le plus simple)</h2>
        <ol>
        <li>Ouvre Matin et va dans <b>Réglages</b>.</li>
        <li>Descends jusqu'à <b>Mon compte</b>.</li>
        <li>Appuie sur <b>Supprimer mon compte</b> et confirme.</li>
        </ol>

        <h2>Sans l'application</h2>
        <p>Remplis le formulaire. Nous t'écrivons pour confirmer que la demande vient bien de toi, puis nous supprimons le compte.</p>

        <h2>Ce qui est supprimé</h2>
        <ul>
        <li>Ton compte et tes préférences.</li>
        <li>Les résumés de briefing et l'historique des commandes.</li>
        <li>Les jetons d'accès à Gmail et Google Agenda (l'accès est révoqué).</li>
        </ul>
        <h2>Ce qui est conservé</h2>
        <p>Les factures, pendant la durée exigée par la loi [10 ans, à vérifier]. Rien d'autre.</p>
        <p><b>Délai :</b> suppression effective sous 30 jours au plus.</p>
        <p>Tu peux aussi couper immédiatement l'accès de Matin depuis <a href="https://myaccount.google.com/permissions" target="_blank" rel="noopener">ton compte Google</a>.</p>
    </article>

    <div class="col-lg-6">
  <form class="beta-form" id="formulaire" action="{{ route('supprimer-compte.send') }}" method="post" data-form="suppression" novalidate data-ajax-form>
    @csrf
    <h2 class="h3">Demander la suppression</h2>

    @if(session('success'))
      <div class="alert alert-success" role="status">{{ session('success') }}</div>
    @endif
    <div class="form-alert alert alert-danger" role="status" hidden></div>

    <div>
      <label class="form-label" for="s-email">Adresse Gmail utilisée avec Matin</label>
      <input class="form-control @error('email') is-invalid @enderror" type="email" id="s-email" name="email" value="{{ old('email') }}" autocomplete="email" maxlength="120" required>
      <div class="invalid-feedback" data-error-for="email">{{ $errors->first('email') }}</div>
    </div>

    <div class="form-check">
      <input class="form-check-input @error('confirm') is-invalid @enderror" type="checkbox" id="s-confirm" name="confirm" value="1" required>
      <label class="form-check-label" for="s-confirm">Je comprends que mon compte et mes données seront définitivement supprimés.</label>
      <div class="invalid-feedback" data-error-for="confirm">{{ $errors->first('confirm') }}</div>
    </div>

    <div class="hp-field" aria-hidden="true"><label for="s-site">Site web</label><input type="text" id="s-site" name="site_web" tabindex="-1" autocomplete="off"></div>

    <button class="btn btn-danger-soft" type="submit">
      <svg class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M4 7h16M10 11v6M14 11v6M6 7l1 13h10l1-13M9 7V4h6v3"/></svg>
      <span class="btn-label">Demander la suppression</span>
    </button>
  </form>
</div>
    </div>
  </div>

@endsection