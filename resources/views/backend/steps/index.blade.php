@extends('backend.layouts.app')
@section('title', 'Comment ça marche')
@section('content')
<div class="head"><span>{{ $steps->count() }} élément(s)</span>
<a class="btn" href="{{ route('admin.steps.create') }}">@include('backend.partials.icon', ['name' => 'plus']) Ajouter</a></div>
<div class="card">
<table>
<thead><tr><th>Position</th><th>Titre</th><th>Statut</th><th>Actions</th></tr></thead>
<tbody>
@forelse($steps as $step)
<tr>
<td>{{ $step->sort_order }}</td>
<td>{{ \Illuminate\Support\Str::limit($step->title, 70) }}</td>
<td><span @class(['badge', 'off' => ! $step->is_active])>{{ $step->is_active ? 'Visible' : 'Masqué' }}</span></td>
<td><div class="acts">
<a class="btn icon" href="{{ route('admin.steps.edit', $step) }}" aria-label="Modifier" title="Modifier">@include('backend.partials.icon', ['name' => 'pencil'])</a>
<a class="btn icon" href="{{ route('admin.steps.active', $step) }}" aria-label="Supprimer" title="Supprimer">
    @if($step->is_active)
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
