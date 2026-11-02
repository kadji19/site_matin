<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Matin, ton assistante vocale pour Gmail et Google Agenda</title>
  <meta name="description" content="Chaque matin, Matin résume ta journée : rendez-vous, e-mails importants et rappels. Réponds et gère ton agenda à la voix. Gratuit pour commencer.">
    <link rel="canonical" href="https://[votre-domaine]/">
  <meta name="theme-color" content="#16181D">

  <!-- Partage (Open Graph / Twitter) -->
  <meta property="og:type" content="website">
  <meta property="og:locale" content="fr_FR">
  <meta property="og:site_name" content="Matin">
  <meta property="og:title" content="Matin, ton assistante vocale pour Gmail et Google Agenda">
  <meta property="og:description" content="Chaque matin, Matin résume ta journée : rendez-vous, e-mails importants et rappels. Réponds et gère ton agenda à la voix. Gratuit pour commencer.">
  <meta property="og:url" content="https://[votre-domaine]/">
  <meta property="og:image" content="https://[votre-domaine]/assets/img/og-image.png">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta name="twitter:card" content="summary_large_image">

  <!-- Icônes -->
  <link rel="icon" href="{{asset('assets/img/favicon.svg')}}" type="image/svg+xml">
  <link rel="icon" href="{{asset('assets/img/favicon-32.png')}}" sizes="32x32" type="image/png">
  <link rel="apple-touch-icon" href="{{asset('assets/img/apple-touch-icon.png')}}">
  <link rel="manifest" href="site.webmanifest">

  <!-- Polices auto-hébergées (préchargement des graisses principales) -->
  <link rel="preload" href="{{asset('assets/fonts/manrope-latin-800-normal.woff2')}}" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="{{asset('assets/fonts/manrope-latin-500-normal.woff2" as="font')}}" type="font/woff2" crossorigin>

  <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

          <script>
    /* Suit le thème clair/sombre du téléphone ou de l'ordinateur. */
    (function () {
      var m = window.matchMedia('(prefers-color-scheme: dark)');
      var set = function () { document.documentElement.setAttribute('data-bs-theme', m.matches ? 'dark' : 'light'); };
      set(); if (m.addEventListener) m.addEventListener('change', set);
    })();
  </script>
  
  {{-- <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "SoftwareApplication",
    "name": "Matin",
    "operatingSystem": "Android",
    "applicationCategory": "ProductivityApplication",
    "inLanguage": "fr",
    "description": "Matin lit ton Gmail et ton agenda, t'envoie chaque matin l'essentiel, et t'obéit à la voix. Tu gardes toujours le dernier mot.",
    "url": "https://[votre-domaine]/",
    "offers": [
        {
            "@type": "Offer",
            "name": "Gratuit",
            "price": "0",
            "priceCurrency": "XOF"
        },
        {
            "@type": "Offer",
            "name": "Essentiel",
            "price": "2000",
            "priceCurrency": "XOF"
        },
        {
            "@type": "Offer",
            "name": "Pro",
            "price": "5000",
            "priceCurrency": "XOF"
        }
    ]
}  </script>
    <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {
            "@type": "Question",
            "name": "Matin peut-il envoyer des e-mails sans mon accord ?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Non, jamais. Matin prépare un brouillon et attend que tu appuies sur « Confirmer ». Ce réglage est toujours activé et ne peut pas être désactivé."
            }
        },
        {
            "@type": "Question",
            "name": "Est-ce que Matin lit tous mes e-mails ?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Matin analyse tes e-mails récents pour en tirer un résumé. Le contenu complet n'est pas conservé sur nos serveurs, seulement les résumés de ton briefing."
            }
        },
        {
            "@type": "Question",
            "name": "Ça marche avec Outlook ou Yahoo ?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Pas encore. Matin fonctionne aujourd'hui avec Gmail et Google Agenda. D'autres services suivront."
            }
        },
        {
            "@type": "Question",
            "name": "Est-ce que ça consomme beaucoup de données ?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Non. L'application pèse moins de 15 Mo et le travail lourd se fait sur nos serveurs. Elle reste utilisable en 3G."
            }
        },
        {
            "@type": "Question",
            "name": "Comment je paie l'abonnement ?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Par Mobile Money (Flooz, T-Money) ou par carte bancaire, sans engagement. Tu peux arrêter quand tu veux."
            }
        },
        {
            "@type": "Question",
            "name": "Comment supprimer mon compte et mes données ?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Depuis les réglages de l'app, ou sur la page « Supprimer mon compte » du site. Tes données sont effacées et l'accès à Google est révoqué."
            }
        },
        {
            "@type": "Question",
            "name": "L'application existe sur iPhone ?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Bientôt. Inscris-toi à la bêta pour être prévenu de la sortie sur l'App Store."
            }
        }
    ]
}  </script> --}}

</head>
<body>
    <!-- header -->
    {{-- @include('partials.header') --}}
    @include('frontend.partials.header')

    <main id="contenu">
        @yield('content')
    </main>
    

    <!-- footer -->
    @include('frontend.partials.footer') 
    
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}" defer></script>
    <script src="{{asset('assets/js/config.js')}}" defer></script>
    <script src="{{asset('assets/vendor/qrcode/qrcode.js')}}" defer></script>
<script>
    window.MATIN_CONFIG = window.MATIN_CONFIG || {};

    window.MATIN_CONFIG.supportEmail =
        @json($settings['company_email'] ?? '');

    window.MATIN_CONFIG.forms = {
        ...(window.MATIN_CONFIG.forms || {}),
        beta: @json(route('beta.signup'))
    };
</script>


    
    <script src="{{asset('assets/js/main.js')}}" defer></script>
</body>
</html>