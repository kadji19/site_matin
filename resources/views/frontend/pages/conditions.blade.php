@extends('frontend.layout.index')

@section('content')

  <section class="page-hero">
    <div class="container">
      <nav aria-label="Fil d'Ariane">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
          <li class="breadcrumb-item active" aria-current="page">Conditions d'utilisation</li>
        </ol>
      </nav>
      <h1>Conditions d'utilisation</h1>
      @if(!empty($settings['legal_updated_at']))
        <p class="page-updated">Dernière mise à jour : {{ \Carbon\Carbon::parse($settings['legal_updated_at'])->locale('fr')->translatedFormat('j F Y') }}</p>
      @endif
    </div>
  </section>

  <div class="container page-body">
    <article class="legal legal-narrow">
      {{-- <div class="alert alert-warning">Modèle à compléter et à faire relire par un juriste avant publication.</div> --}}

      <h2>1. Objet</h2>
      <p>Les présentes conditions encadrent l'utilisation de l'application Matin et du site https://{{ $settings['site_domain'] ?? '' }}, édités par {{ $settings['company_name'] ?? '' }}.</p>

      <h2>2. Le service</h2>
      <p>Matin prépare un briefing quotidien à partir de ton compte Gmail et de ton Google Agenda, envoie des notifications et permet d'agir sur ces services à la voix. Toute action d'envoi, de modification ou de suppression nécessite ta confirmation.</p>

      <h2>3. Compte</h2>
      <p>L'accès nécessite un compte Google. Tu es responsable de la sécurité de ton téléphone et de ton compte Google. Tu dois avoir au moins [18] ans.</p>

      <h2>4. Responsabilité de l'utilisateur</h2>
      <p>Tu vérifies les brouillons et les modifications proposés avant de les confirmer. Matin peut se tromper dans un résumé ou une transcription ; les contenus envoyés après ta confirmation restent sous ta responsabilité.</p>

      <h2>5. Offres et paiement</h2>
      <ul>
        @foreach($plans as $plan)
          <li><b>{{ $plan->name }}</b> :
            @if($plan->price_monthly == 0)
              gratuit.
            @else
              {{ number_format($plan->price_monthly, 0, ',', ' ') }} FCFA par mois@if($plan->price_yearly) ou {{ number_format($plan->price_yearly, 0, ',', ' ') }} FCFA par an@endif.
            @endif
          </li>
        @endforeach
      </ul>
      <p>Paiement par {{ $settings['pay_methods'] ?? '' }}. L'abonnement est sans engagement et se renouvelle [automatiquement / à chaque paiement]. Résiliation à tout moment depuis l'application ; le service reste actif jusqu'à la fin de la période payée. [Conditions de remboursement à préciser.]</p>

      <h2>6. Disponibilité</h2>
      <p>Nous faisons notre possible pour que le service soit disponible en continu, sans pouvoir le garantir (maintenance, panne d'un prestataire, indisponibilité des services Google).</p>

      <h2>7. Données personnelles</h2>
      <p>Voir la <a href="{{ route('confidentialite') }}">politique de confidentialité</a>.</p>

      <h2>8. Résiliation</h2>
      <p>Tu peux supprimer ton compte à tout moment (<a href="{{ route('supprimer-compte') }}">Supprimer mon compte</a>). Nous pouvons suspendre un compte en cas d'usage abusif ou illégal.</p>

      <h2>9. Droit applicable</h2>
      <p>Les présentes conditions sont soumises au droit togolais. En cas de litige, une solution amiable est recherchée en priorité ; à défaut, les tribunaux de Lomé sont compétents [à valider].</p>

      <h2>10. Contact</h2>
      <p><a href="mailto:{{ $settings['company_email'] ?? '' }}">{{ $settings['company_email'] ?? '' }}</a></p>
    </article>
  </div>

@endsection