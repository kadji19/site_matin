@extends('backend.layouts.app')
@section('title', 'Fonctionnalités')
@section('content')
<div class="head"><span>{{ $features->count() }} élément(s)</span>
<a class="btn" href="{{ route('admin.features.create') }}">@include('backend.partials.icon', ['name' => 'plus']) Ajouter</a></div>
<div class="card">
<table>
<thead><tr><th>Position</th><th>Titre</th><th>Statut</th><th>Actions</th></tr></thead>
<tbody>
@forelse($features as $feature)
<tr>
<td>{{ $feature->sort_order }}</td>
<td>{{ \Illuminate\Support\Str::limit($feature->title, 70) }}</td>
<td><span @class(['badge', 'off' => ! $feature->is_active])>{{ $feature->is_active ? 'Visible' : 'Masqué' }}</span></td>
<td><div class="acts">
<a class="btn icon" href="{{ route('admin.features.edit', $feature) }}" aria-label="Modifier" title="Modifier">@include('backend.partials.icon', ['name' => 'pencil'])</a>
<a class="btn icon" href="{{ route('admin.features.active', $feature) }}" aria-label="Supprimer" title="Supprimer">
    @if($feature->is_active)
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
