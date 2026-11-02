@extends('backend.layouts.app')
@section('title', 'Captures d’écran')
@section('content')
<div class="head"><span>{{ $screenshots->count() }} élément(s)</span>
<a class="btn" href="{{ route('admin.screenshots.create') }}">@include('backend.partials.icon', ['name' => 'plus']) Ajouter</a></div>
<div class="card">
<table>
<thead><tr><th>Position</th><th>Légende</th><th>Statut</th><th>Actions</th></tr></thead>
<tbody>
@forelse($screenshots as $screenshot)
<tr>
<td>{{ $screenshot->sort_order }}</td>
<td>{{ $screenshot->title }}</td>
<td>{{ \Illuminate\Support\Str::limit($screenshot->text, 70) }}</td>
<td><span @class(['badge', 'off' => ! $screenshot->is_active])>{{ $screenshot->is_active ? 'Visible' : 'Masqué' }}</span></td>
<td><div class="acts">
<a class="btn icon" href="{{ route('admin.screenshots.edit', $screenshot) }}" aria-label="Modifier" title="Modifier">@include('backend.partials.icon', ['name' => 'pencil'])</a>
<a class="btn icon" href="{{ route('admin.screenshots.active', $screenshot) }}" aria-label="Supprimer" title="Supprimer">
    @if($screenshot->is_active)
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
