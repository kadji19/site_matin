
@extends('backend.layouts.app')

@section('title', 'Réglages')

@section('content')

@php
$groups = [
    'Page d’accueil' => [
        ['hero_title', 'Titre principal', 'text'],
        ['hero_title_accent', 'Texte accentué', 'text'],
        ['hero_subtitle', 'Sous-titre', 'textarea'],
        ['hero_appstore_url', 'Lien App Store', 'text'],
        ['hero_playstore_url', 'Lien Google Play', 'text'],
        ['hero_image', 'Aperçu de l’app', 'file'],
    ],

    'Comment ça marche' => [
        ['step_question', 'Question / Petit titre', 'text'],
        ['step_title', 'Titre principal', 'text'],
    ],

    'Fonctionnalités' => [
        ['feature_question', 'Question / Petit titre', 'text'],
        ['feature_title', 'Titre principal', 'text'],
        ['feature_subtitle', 'Sous-titre', 'textarea'],
    ],

    'Captures d’écran' => [
        ['screenshot_question', 'Question / Petit titre', 'text'],
        ['screenshot_title', 'Titre principal', 'text'],
        ['screenshot_subtitle', 'Sous-titre', 'textarea'],
    ],

    'E-mail du matin' => [
        ['morning_email_question', 'Question / Petit titre', 'text'],
        ['morning_email_title', 'Titre principal', 'text'],
        ['morning_email_text', 'Description', 'textarea'],
        ['morning_email_image', 'Image d’aperçu', 'file'],
    ],

    'Commandes vocales' => [
        ['voice_question', 'Question / Petit titre', 'text'],
        ['voice_title', 'Titre principal', 'text'],
        ['voice_subtitle', 'Sous-titre', 'textarea'],
    ],

    'Sécurité et vie privée' => [
        ['security_question', 'Question / Petit titre', 'text'],
        ['security_title', 'Titre principal', 'text'],
        ['security_intro', 'Introduction', 'textarea'],
    ],

    'Tarifs' => [
        ['tarif_question', 'Question / Petit titre', 'text'],
        ['tarif_title', 'Titre principal', 'text'],
    ],

    'Questions fréquentes' => [
        ['faq_question', 'Question / Petit titre', 'text'],
        ['faq_title', 'Titre principal', 'text'],
    ],

    'Appel à l’action' => [
        ['action_question', 'Question / Petit titre', 'text'],
        ['action_title', 'Titre principal', 'text'],
    ],

    'Tarifs' => [
        ['tarif_question', 'Question / Petit titre', 'text'],
        ['tarif_title', 'Titre principal', 'text'],
        ['pay_methods', 'Moyens de paiement (séparés par des virgules)', 'text'],
    ],

    // ... à la fin de $groups :
    'Société et mentions légales' => [
        ['company_name', 'Nom de la société', 'text'],
        ['company_form', 'Forme juridique (SARL, SARLU, SA...)', 'text'],
        ['company_capital', 'Capital (en FCFA)', 'text'],
        ['company_rccm', 'Numéro RCCM', 'text'],
        ['company_nif', 'NIF', 'text'],
        ['company_address', 'Adresse du siège', 'text'],
        ['company_email', 'E-mail de contact', 'text'],
        ['company_phone', 'Téléphone / WhatsApp', 'text'],
        ['company_director', 'Directeur de la publication', 'text'],
        ['company_hosting', 'Hébergeur (nom, adresse, téléphone)', 'textarea'],
        ['site_domain', 'Nom de domaine du site', 'text'],
        ['legal_updated_at', 'Date de mise à jour des pages légales', 'date'],
    ],
];
@endphp

<form class="form-underline" method="POST"
      action="{{ route('admin.settings.update') }}"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    @foreach($groups as $group => $fields)

        <section class="card">

            <h2>{{ $group }}</h2>

            @foreach($fields as [$key, $label, $type])

                <div class="field">

                    <label for="{{ $key }}">{{ $label }}</label>

                    @if($type === 'textarea')

                        <textarea
                            id="{{ $key }}"
                            name="{{ $key }}"
                            rows="3"
                        >{{ old($key, $settings->get($key)) }}</textarea>

                    @elseif($type === 'file')

                        @if($settings->get($key))
                            <div class="current-image">
                                <img
                                    class="thumb"
                                    src="{{ asset('storage/' . $settings->get($key)) }}"
                                    alt="{{ $label }}"
                                >
                            </div>
                        @endif

                        <input
                            type="file"
                            id="{{ $key }}"
                            name="{{ $key }}"
                            accept="image/*"
                        >

                    @else

                        <input
                            type="{{ $type === 'date' ? 'date' : 'text' }}"
                            id="{{ $key }}"
                            name="{{ $key }}"
                            value="{{ old($key, $settings->get($key)) }}"
                        >

                    @endif

                    @error($key)
                        <p class="err">{{ $message }}</p>
                    @enderror

                </div>

            @endforeach

        </section>

    @endforeach

    <div class="bar">
        <button class="btn" type="submit">
            Enregistrer les réglages
        </button>
    </div>

</form>

@endsection
