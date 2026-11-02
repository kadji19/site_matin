@extends('backend.layouts.app')
@section('title', 'Sécurité et vie privée')
@section('content')
<div class="head"><span>{{ $securityPoints->count() }} élément(s)</span>
<a class="btn" href="{{ route('admin.security-points.create') }}">@include('backend.partials.icon', ['name' => 'plus']) Ajouter</a></div>
<div class="card">
<table>
<thead><tr><th>Position</th><th>Titre</th><th>Statut</th><th>Actions</th></tr></thead>
<tbody>
@forelse($securityPoints as $security)
<tr>
<td>{{ $security->sort_order }}</td>
<td>{{ \Illuminate\Support\Str::limit($security->title, 70) }}</td>
<td><span @class(['badge', 'off' => ! $security->is_active])>{{ $security->is_active ? 'Visible' : 'Masqué' }}</span></td>
<td><div class="acts">
<a class="btn icon" href="{{ route('admin.security-points.edit', $security) }}" aria-label="Modifier" title="Modifier">@include('backend.partials.icon', ['name' => 'pencil'])</a>
<a class="btn icon" href="{{ route('admin.security-points.active', $security) }}" aria-label="Supprimer" title="Supprimer">
    @if($security->is_active)
        <button class="btn icon" type="submit" aria-label="Supprimer" title="Supprimer" onclick="return confirm('Supprimer cet élément ? Vous pourrez le restaurer.')">@include('backend.partials.icon', ['name' => 'trash'])</button>
    @else
        <button class="btn icon restore" type="submit" aria-label="Restaurer" title="Restaurer">@include('backend.partials.icon', ['name' => 'restore'])</button>
    @endif
</a>
</div></td>
</tr>
@empty
<tr><td colspan="4" class="empty">Aucun élément pour le moment. Ajoutez le premier.</td></tr>
@endforelse
</tbody>
</table>
</div>
@endsection
