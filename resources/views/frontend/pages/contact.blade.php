@extends('frontend.layout.index')

@section('content')

@php
    $phone    = $settings['company_phone'] ?? '';
    $waNumber = preg_replace('/\D/', '', $phone);
@endphp

  <section class="page-hero">
    <div class="container">
      <nav aria-label="Fil d'Ariane"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li><li class="breadcrumb-item active" aria-current="page">Nous contacter</li></ol></nav>
      <h1>Nous contacter</h1>
      <p class="page-intro">Une question, un problème avec l'app, une proposition ? Nous répondons sous 48 heures ouvrées.</p>
    </div>
  </section>

  <div class="container page-body">
    <div class="row g-4 g-lg-5">

      <div class="col-lg-5 d-flex flex-column gap-4">
        <div class="contact-card">
          <span class="feature-icon"><svg class="icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M4 20l1.3-3.9A8 8 0 1 1 8 19z"/><path d="M9 9.5c0 3 2.5 5.5 5.5 5.5l1-1.5-2-1-1 .8a4 4 0 0 1-1.8-1.8l.8-1-1-2z" fill="currentColor" stroke="none"/></svg></span>
          <h2>WhatsApp</h2>
          <p>Le plus rapide pour le support.</p>
          <div class="copy-line"><code id="c-wa">{{ $phone }}</code><button type="button" class="btn-copy" data-copy="c-wa">Copier</button></div>
          @if(strlen($waNumber) >= 8)
            <a class="btn btn-outline-ink" href="https://wa.me/{{ $waNumber }}" target="_blank" rel="noopener">Ouvrir WhatsApp</a>
          @endif
        </div>

        <div class="contact-card">
          <span class="feature-icon"><svg class="icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/></svg></span>
          <h2>E-mail</h2>
          <div class="copy-line"><code id="c-mail">{{ $settings['company_email'] ?? '' }}</code><button type="button" class="btn-copy" data-copy="c-mail">Copier</button></div>
          <p class="mb-0">{{ $settings['company_address'] ?? '' }}, Lomé, Togo</p>
        </div>
      </div>

      <div class="col-lg-7">
        <form class="beta-form" id="formulaire" action="{{ route('contact.send') }}" method="post" data-form="contact" novalidate data-ajax-form>
          @csrf
          <h2 class="h3">Envoyer un message</h2>

          @if(session('success'))
            <div class="alert alert-success" role="status">{{ session('success') }}</div>
          @endif
          <div class="form-alert alert alert-danger" role="status" hidden></div>

          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label" for="c-nom">Nom</label>
              <input class="form-control @error('nom') is-invalid @enderror" type="text" id="c-nom" name="nom" value="{{ old('nom') }}" autocomplete="name" maxlength="80" required>
              <div class="invalid-feedback" data-error-for="nom">{{ $errors->first('nom') }}</div>
            </div>
            <div class="col-md-6">
              <label class="form-label" for="c-email">E-mail</label>
              <input class="form-control @error('email') is-invalid @enderror" type="email" id="c-email" name="email" value="{{ old('email') }}" autocomplete="email" maxlength="120" required>
              <div class="invalid-feedback" data-error-for="email">{{ $errors->first('email') }}</div>
            </div>
          </div>

          <div>
            <label class="form-label" for="c-sujet">Sujet</label>
            <select class="form-select" id="c-sujet" name="sujet">
              @foreach(\App\Models\ContactMessage::SUBJECTS as $value => $label)
                <option value="{{ $value }}" @selected(old('sujet') === $value)>{{ $label }}</option>
              @endforeach
            </select>
          </div>

          <div>
            <label class="form-label" for="c-message">Message</label>
            <textarea class="form-control @error('message') is-invalid @enderror" id="c-message" name="message" rows="6" maxlength="3000" required>{{ old('message') }}</textarea>
            <div class="invalid-feedback" data-error-for="message">{{ $errors->first('message') }}</div>
          </div>

          <div class="hp-field" aria-hidden="true"><label for="c-site">Site web</label><input type="text" id="c-site" name="site_web" tabindex="-1" autocomplete="off"></div>

          <button class="btn btn-accent" type="submit"><span class="btn-label">Envoyer le message</span></button>
        </form>
      </div>

    </div>
  </div>

@endsection