@extends('frontend.layout.index')

@section('content')

  <section class="page-hero">
    <div class="container">
      <nav aria-label="Fil d'Ariane">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
          <li class="breadcrumb-item active" aria-current="page">Mentions légales</li>
        </ol>
      </nav>
      <h1>Mentions légales</h1>
      @if(!empty($settings['legal_updated_at']))
        <p class="page-updated">Dernière mise à jour : {{ \Carbon\Carbon::parse($settings['legal_updated_at'])->locale('fr')->translatedFormat('j F Y') }}</p>
      @endif
    </div>
  </section>

  <div class="container page-body">
    <article class="legal legal-narrow">

      <h2>Éditeur du site</h2>
      <dl class="legal-dl">
        <dt>Société</dt>
        <dd>{{ $settings['company_name'] ?? '' }}, {{ $settings['company_form'] ?? '' }} au capital de {{ $settings['company_capital'] ?? '' }} FCFA</dd>

        <dt>RCCM</dt>
        <dd>{{ $settings['company_rccm'] ?? '' }}</dd>

        <dt>NIF</dt>
        <dd>{{ $settings['company_nif'] ?? '' }}</dd>

        <dt>Siège</dt>
        <dd>{{ $settings['company_address'] ?? '' }}, Lomé, Togo</dd>

        <dt>E-mail</dt>
        <dd><a href="mailto:{{ $settings['company_email'] ?? '' }}">{{ $settings['company_email'] ?? '' }}</a></dd>

        <dt>Téléphone / WhatsApp</dt>
        <dd>{{ $settings['company_phone'] ?? '' }}</dd>

        <dt>Directeur de la publication</dt>
        <dd>{{ $settings['company_director'] ?? '' }}</dd>
      </dl>

      <h2>Hébergement</h2>
      <p>{{ $settings['company_hosting'] ?? '' }}</p>

      <h2>Propriété intellectuelle</h2>
      <p>Les textes, visuels, logos et le code du site sont la propriété de {{ $settings['company_name'] ?? '' }}, sauf mention contraire. Toute reproduction sans autorisation est interdite.</p>
      <p>Gmail, Google Agenda, Google Play et le logo Google Play sont des marques de Google LLC. App Store est une marque d'Apple Inc. Matin n'est ni affilié à ces sociétés, ni approuvé par elles.</p>
      <p>Polices : Manrope et IBM Plex Mono, sous licence SIL Open Font License.</p>

      <h2>Données personnelles</h2>
      <p>Voir la <a href="{{ route('confidentialite') }}">politique de confidentialité</a>.</p>

    </article>
  </div>

@endsection