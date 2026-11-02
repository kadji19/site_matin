@extends('frontend.layout.index')

@section('content')

  <section class="page-hero">
    <div class="container">
      <nav aria-label="Fil d'Ariane">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
          <li class="breadcrumb-item active" aria-current="page">Politique de confidentialité</li>
        </ol>
      </nav>
      <h1>Politique de confidentialité</h1>
      <p class="page-intro">Ce que Matin fait de tes données, pourquoi, combien de temps, et comment exercer tes droits.</p>
      @if(!empty($settings['legal_updated_at']))
        <p class="page-updated">Dernière mise à jour : {{ \Carbon\Carbon::parse($settings['legal_updated_at'])->locale('fr')->translatedFormat('j F Y') }}</p>
      @endif
    </div>
  </section>

  <div class="container page-body">
    <div class="row g-4 g-lg-5">
      <aside class="col-lg-3 d-none d-lg-block">
        <nav class="toc" aria-label="Sommaire">
          <a href="#responsable">Responsable</a><a href="#donnees">Données collectées</a><a href="#google">Données Google</a>
          <a href="#finalites">Finalités</a><a href="#conservation">Conservation</a><a href="#partage">Partage</a>
          <a href="#securite">Sécurité</a><a href="#droits">Tes droits</a><a href="#cookies">Cookies</a><a href="#contact-dpo">Contact</a>
        </nav>
      </aside>

      <article class="col-lg-9 legal">
        {{-- <div class="alert alert-warning">Modèle à compléter et à faire relire par un juriste avant publication. Les éléments entre crochets sont à remplacer.</div> --}}

        <h2 id="responsable">1. Responsable du traitement</h2>
        <p>{{ $settings['company_name'] ?? '' }}, {{ $settings['company_form'] ?? '' }}, immatriculée sous le numéro {{ $settings['company_rccm'] ?? '' }}, dont le siège est situé {{ $settings['company_address'] ?? '' }}, Lomé, Togo (ci-après « Matin », « nous »).</p>

        <h2 id="donnees">2. Données que nous collectons</h2>
        <h3>Sur ce site</h3>
        <ul>
          <li>Formulaire de la bêta : prénom, e-mail ou numéro WhatsApp, type de téléphone.</li>
          <li>Formulaire de contact : nom, e-mail, sujet et message.</li>
          <li>Mesure d'audience, uniquement si tu l'acceptes : pages vues et clics, de façon anonyme.</li>
        </ul>
        <h3>Dans l'application</h3>
        <ul>
          <li>Ton compte Google : nom, adresse e-mail, photo de profil.</li>
          <li>Tes préférences : heure du briefing, notifications, fuseau horaire.</li>
          <li>Les données Google décrites à la section 3.</li>
          <li>Les commandes vocales : la transcription est faite sur ton téléphone ; seul le texte de la commande est envoyé à nos serveurs pour être compris, puis supprimé après exécution [à confirmer selon l'implémentation].</li>
        </ul>

        <h2 id="google">3. Utilisation des données Google (Gmail et Google Agenda)</h2>
        <p>Avec ton autorisation, donnée sur la page officielle de Google, Matin accède aux données suivantes :</p>
        <ul>
          <li><b>Gmail</b> : lecture des en-têtes et du contenu des e-mails récents pour préparer ton briefing ; création de brouillons et envoi d'e-mails <b>uniquement après ta confirmation explicite</b> dans l'application.</li>
          <li><b>Google Agenda</b> : lecture de tes événements ; création, modification ou suppression d'un événement <b>uniquement après ta confirmation</b>.</li>
        </ul>
        <p>Le contenu complet de tes e-mails n'est pas conservé : nous gardons seulement des identifiants techniques et les résumés courts nécessaires à ton briefing, pendant [7] jours.</p>
        <p>Pour résumer et comprendre tes e-mails et tes commandes, des extraits sont transmis à notre prestataire d'intelligence artificielle [Anthropic, API Claude], qui agit pour notre compte et n'utilise pas ces données pour entraîner ses modèles [à vérifier dans les conditions du prestataire].</p>

        {{-- Texte exigé par Google (Limited Use) : ne pas reformuler ni supprimer --}}
        <div class="legal-callout">
          <p class="mb-0">L'utilisation et le transfert à toute autre application des informations reçues des API Google par Matin respectent les <a href="https://developers.google.com/terms/api-services-user-data-policy" target="_blank" rel="noopener">Google API Services User Data Policy</a>, y compris les exigences d'utilisation limitée (Limited Use).</p>
        </div>
        <p>En particulier, nous n'utilisons jamais tes données Google pour de la publicité, nous ne les vendons pas, et aucune personne de notre équipe ne les lit, sauf avec ton accord explicite pour résoudre un problème, pour des raisons de sécurité ou pour respecter la loi.</p>

        <h2 id="finalites">4. Pourquoi nous utilisons ces données</h2>
        <ul>
          <li>Fournir le service : briefing, notifications, commandes vocales, rappels.</li>
          <li>Gérer ton compte et ton abonnement.</li>
          <li>Répondre à tes demandes de support.</li>
          <li>T'informer de la sortie de l'app ou des nouveautés, si tu l'as demandé.</li>
          <li>Améliorer le site, avec des statistiques anonymes et seulement si tu l'acceptes.</li>
        </ul>

        <h2 id="conservation">5. Durée de conservation</h2>
        <ul>
          <li>Résumés de briefing : [7] jours.</li>
          <li>Données de compte : tant que ton compte est actif, puis supprimées sous 30 jours après la fermeture.</li>
          <li>Inscriptions à la bêta : jusqu'à ta désinscription, au plus [3] ans.</li>
          <li>Messages de contact : [1] an.</li>
        </ul>

        <h2 id="partage">6. Avec qui les données sont partagées</h2>
        <p>Uniquement avec nos prestataires techniques, pour faire fonctionner le service : hébergement [nom, pays], intelligence artificielle [Anthropic, États-Unis], notifications [Firebase Cloud Messaging, Google], paiement [prestataire Mobile Money]. Nous ne vendons aucune donnée.</p>

        <h2 id="securite">7. Sécurité</h2>
        <p>Connexions chiffrées (HTTPS), jetons d'accès Google chiffrés sur nos serveurs, accès interne limité et journalisé. Tu peux révoquer l'accès de Matin à tout moment depuis <a href="https://myaccount.google.com/permissions" target="_blank" rel="noopener">ton compte Google</a>.</p>

        <h2 id="droits">8. Tes droits</h2>
        <p>Conformément à la loi togolaise n° 2019-014 du 29 octobre 2019 relative à la protection des données à caractère personnel [référence à vérifier] et, pour les personnes situées dans l'Union européenne, au RGPD, tu peux demander l'accès, la rectification, la suppression ou la portabilité de tes données, et t'opposer à leur traitement.</p>
        <p>Pour supprimer ton compte et toutes tes données, utilise l'application ou la page <a href="{{ route('supprimer-compte') }}">Supprimer mon compte</a>. Tu peux aussi saisir l'autorité de protection des données de ton pays [IPDCP au Togo, à vérifier].</p>

        <h2 id="cookies">9. Cookies</h2>
        <p>Le site utilise un cookie technique de session (sécurité des formulaires) et, seulement si tu l'acceptes, un outil de mesure d'audience [nom de l'outil]. Ton choix est mémorisé dans ton navigateur ; tu peux le modifier en effaçant les données du site.</p>

        <h2 id="contact-dpo">10. Nous contacter</h2>
        <p>Pour toute question sur tes données : <b><a href="mailto:{{ $settings['company_email'] ?? '' }}">{{ $settings['company_email'] ?? '' }}</a></b>, ou par courrier à {{ $settings['company_address'] ?? '' }}, Lomé, Togo.</p>
      </article>
    </div>
  </div>

@endsection