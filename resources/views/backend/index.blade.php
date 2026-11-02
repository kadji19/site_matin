@extends('backend.layouts.app')
@section('title', 'Messages')
@section('content')
<div class="head"><span>{{ $messages->whereNull('handled_at')->count() }} nouveau(x) · {{ $messages->count() }} au total</span></div>
<div class="card">
<table>
<thead><tr><th>Date</th><th>De</th><th>Sujet</th><th>Message</th><th>Statut</th><th>Actions</th></tr></thead>
<tbody>
@forelse($messages as $contact)
<tr>
<td>{{ $contact->created_at->locale('fr')->translatedFormat('j M Y, H:i') }}</td>
<td>{{ $contact->name }}<br><small>{{ $contact->email }}</small></td>
<td>{{ \App\Models\ContactMessage::SUBJECTS[$contact->subject] ?? $contact->subject }}</td>
<td>{{ \Illuminate\Support\Str::limit($contact->message, 60) }}</td>
<td><span @class(['badge', 'off' => $contact->handled_at])>{{ $contact->handled_at ? 'Traité' : 'Nouveau' }}</span></td>
<td><div class="acts">
<a class="btn icon" href="{{ route('admin.contact-messages.show', $contact) }}" aria-label="Lire" title="Lire">@include('backend.partials.icon', ['name' => 'eye'])</a>
<form method="POST" action="{{ route('admin.contact-messages.handled', $contact) }}">@csrf @method('PATCH')
@if($contact->handled_at)
<button class="btn icon restore" type="submit" aria-label="Rouvrir" title="Rouvrir">@include('backend.partials.icon', ['name' => 'restore'])</button>
@else
<button class="btn icon" type="submit" aria-label="Marquer comme traité" title="Marquer comme traité">@include('backend.partials.icon', ['name' => 'check'])</button>
@endif
</form>
</div></td>
</tr>
@empty
<tr><td colspan="6" class="empty">Aucun message pour le moment.</td></tr>
@endforelse
</tbody>
</table>
</div>
@endsection