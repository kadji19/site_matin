@extends('backend.layouts.app')
@section('title', 'Demandes de suppression')
@section('content')
<div class="head"><span>{{ $deletions->whereNull('handled_at')->count() }} à traiter</span></div>
<p class="hint">Avant de supprimer un compte, écris à l'adresse indiquée pour vérifier que la demande vient bien de la personne concernée.</p>
<div class="card">
<table>
<thead><tr><th>Date</th><th>E-mail</th><th>Statut</th><th>Actions</th></tr></thead>
<tbody>
@forelse($deletions as $deletion)
<tr>
<td>{{ $deletion->created_at->locale('fr')->translatedFormat('j M Y, H:i') }}</td>
<td>{{ $deletion->email }}</td>
<td><span @class(['badge', 'off' => $deletion->handled_at])>{{ $deletion->handled_at ? 'Traitée' : 'À traiter' }}</span></td>
<td><div class="acts">
<a class="btn icon" href="mailto:{{ $deletion->email }}" aria-label="Écrire à cette adresse" title="Écrire à cette adresse">@include('backend.partials.icon', ['name' => 'mail'])</a>

@unless($deletion->handled_at)
<form method="POST" action="{{ route('admin.deletion-requests.handled', $deletion) }}">@csrf @method('PATCH')
<button class="btn icon" type="submit" aria-label="Marquer comme traitée" title="Marquer comme traitée"
        onclick="return confirm('Marquer cette demande comme traitée ? Cette action est définitive.')">@include('backend.partials.icon', ['name' => 'check'])</button>
</form>
@endunless
</div></td>
</tr>
@empty
<tr><td colspan="4" class="empty">Aucune demande pour le moment.</td></tr>
@endforelse
</tbody>
</table>
</div>
@endsection