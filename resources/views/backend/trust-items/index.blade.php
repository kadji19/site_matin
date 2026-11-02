@extends('backend.layouts.app')
@section('title', 'Bandeau de réassurance')
@section('content')
<div class="head"><span>{{ $trustItems->count() }} élément(s)</span>
<a class="btn" href="{{ route('admin.trust-items.create') }}">@include('backend.partials.icon', ['name' => 'plus']) Ajouter</a></div>
<div class="card">
<table>
<thead><tr><th>Position</th><th>Texte</th><th>Statut</th><th>Actions</th></tr></thead>
<tbody>
@forelse($trustItems as $item)
<tr>
<td>{{ $item->sort_order }}</td>
<td>{{ \Illuminate\Support\Str::limit($item->text, 70) }}</td>
<td><span @class(['badge', 'off' => ! $item->is_active])>{{ $item->is_active ? 'Visible' : 'Masqué' }}</span></td>
<td><div class="acts">
<a class="btn icon" href="{{ route('admin.trust-items.edit', $item) }}" aria-label="Modifier" title="Modifier">@include('backend.partials.icon', ['name' => 'pencil'])</a>
<a class="btn icon" href="{{ route('admin.trust-items.active', $item) }}" aria-label="Supprimer" title="Supprimer">
    @if($item->is_active)
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
