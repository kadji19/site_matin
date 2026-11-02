@extends('backend.layouts.app')
@section('title', 'Message')
@section('content')
<div class="head">
<a class="btn ghost" href="{{ route('admin.contact-messages.index') }}">Retour aux messages</a>
<span @class(['badge', 'off' => $contactMessage->handled_at])>{{ $contactMessage->handled_at ? 'Traité' : 'Nouveau' }}</span>
</div>
<div class="card">
<p><b>De :</b> {{ $contactMessage->name }} ({{ $contactMessage->email }})</p>
<p><b>Sujet :</b> {{ \App\Models\ContactMessage::SUBJECTS[$contactMessage->subject] ?? $contactMessage->subject }}</p>
<p><b>Reçu le :</b> {{ $contactMessage->created_at->locale('fr')->translatedFormat('j F Y à H:i') }}</p>
<div class="msg">{{ $contactMessage->message }}</div>
<div class="bar">
<a class="btn" href="mailto:{{ $contactMessage->email }}">@include('backend.partials.icon', ['name' => 'mail']) Répondre par e-mail</a>
@unless($contactMessage->handled_at)
<form method="POST" action="{{ route('admin.contact-messages.handled', $contactMessage) }}">@csrf @method('PATCH')
<button class="btn ghost" type="submit" onclick="return confirm('Marquer ce message comme traité ? Cette action est définitive.')">Marquer comme traité</button>
</form>
@endunless
</div>
</div>
@endsection