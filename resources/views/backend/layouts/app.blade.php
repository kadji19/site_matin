<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title') · Administration</title>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('admin/css/admin.css') }}">
</head>
<body>
<div class="app">
<nav class="side" aria-label="Sections">
<div class="brand">Administration</div>
    <a href="{{ route('admin.faqs.index') }}" @class(['on' => request()->routeIs('admin.faqs.*')])>@include('backend.partials.icon', ['name' => 'faq']) FAQ</a>
    <a href="{{ route('admin.trust-items.index') }}" @class(['on' => request()->routeIs('admin.trust-items.*')])>@include('backend.partials.icon', ['name' => 'trust']) Bandeau de réassurance</a>
    <a href="{{ route('admin.steps.index') }}" @class(['on' => request()->routeIs('admin.steps.*')])>@include('backend.partials.icon', ['name' => 'steps']) Comment ça marche</a>
    <a href="{{ route('admin.features.index') }}" @class(['on' => request()->routeIs('admin.features.*')])>@include('backend.partials.icon', ['name' => 'features']) Fonctionnalités</a>
    <a href="{{ route('admin.screenshots.index') }}" @class(['on' => request()->routeIs('admin.screenshots.*')])>@include('backend.partials.icon', ['name' => 'screens']) Captures d’écran</a>
    <a href="{{ route('admin.voice-commands.index') }}" @class(['on' => request()->routeIs('admin.voice-commands.*')])>@include('backend.partials.icon', ['name' => 'voice']) Commandes vocales</a>
    <a href="{{ route('admin.plans.index') }}" @class(['on' => request()->routeIs('admin.plans.*')])>@include('backend.partials.icon', ['name' => 'trust']) Tarifs</a>
    <a href="{{ route('admin.security-points.index') }}" @class(['on' => request()->routeIs('admin.security-points.*')])>@include('backend.partials.icon', ['name' => 'security']) Sécurité et vie privée</a>
    <a href="{{ route('admin.settings.edit') }}" @class(['on' => request()->routeIs('admin.settings.*')])>@include('backend.partials.icon', ['name' => 'settings']) Réglages</a>
    <a href="{{ route('admin.contact-messages.index') }}" @class(['on' => request()->routeIs('admin.contact-messages.*')])>@include('backend.partials.icon', ['name' => 'mail']) Messages</a>
    <a href="{{ route('admin.deletion-requests.index') }}" @class(['on' => request()->routeIs('admin.deletion-requests.*')])>@include('backend.partials.icon', ['name' => 'trash']) Demandes de suppression</a>
    <a href="{{ route('admin.beta-signups.index') }}" @class(['on' => request()->routeIs('admin.beta-signups.*')])>@include('backend.partials.icon', ['name' => 'users']) Inscrits bêta</a>
</nav>
<div class="main">
<header class="top">
<h1>@yield('title')</h1>
<div>
<a class="btn ghost site" href="{{ route('home') }}" target="_blank" rel="noopener">@include('backend.partials.icon', ['name' => 'external']) Voir le site</a>
<form method="POST" action="{{ route('logout') }}">@csrf
<button class="btn ghost out" type="submit">@include('backend.partials.icon', ['name' => 'logout']) Se déconnecter</button></form>
</div>
</header>
<main class="page">
@if(session('success'))<p class="ok" role="status">{{ session('success') }}</p>@endif
@yield('content')
</main>
</div>
</div>
</body>
</html>
