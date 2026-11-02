@extends('backend.layouts.app')
@section('title', 'Commandes vocales')
@section('content')
<div class="head"><span>{{ $voiceCommands->count() }} élément(s)</span>
<a class="btn" href="{{ route('admin.voice-commands.create') }}">@include('backend.partials.icon', ['name' => 'plus']) Ajouter</a></div>
<div class="card">
<table>
<thead><tr><th>Position</th><th>Commande</th><th>Statut</th><th>Actions</th></tr></thead>
<tbody>
@forelse($voiceCommands as $voiceCommand)
<tr>
<td>{{ $voiceCommand->sort_order }}</td>
<td>{{ \Illuminate\Support\Str::limit($voiceCommand->command, 70) }}</td>
<td><span @class(['badge', 'off' => ! $voiceCommand->is_active])>{{ $voiceCommand->is_active ? 'Visible' : 'Masqué' }}</span></td>
<td><div class="acts">
<a class="btn icon" href="{{ route('admin.voice-commands.edit', $voiceCommand) }}" aria-label="Modifier" title="Modifier">@include('backend.partials.icon', ['name' => 'pencil'])</a>
<a class="btn icon" href="{{ route('admin.voice-commands.active', $voiceCommand) }}" aria-label="Supprimer" title="Supprimer">
    @if($voiceCommand->is_active)
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
