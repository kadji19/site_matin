@extends('backend.layouts.app')
@section('title', 'Tarifs')
@section('content')
<div class="head"><span>{{ $plans->count() }} offre(s)</span>
<a class="btn" href="{{ route('admin.plans.create') }}">@include('backend.partials.icon', ['name' => 'plus']) Ajouter</a></div>
<div class="card">
<table>
<thead><tr><th>Position</th><th>Offre</th><th>Prix mensuel</th><th>Statut</th><th>Actions</th></tr></thead>
<tbody>
@forelse($plans as $plan)
<tr>
<td>{{ $plan->sort_order }}</td>
<td>{{ $plan->name }} @if($plan->is_featured)<span class="badge">Mise en avant</span>@endif</td>
<td>{{ number_format($plan->price_monthly, 0, ',', ' ') }} FCFA</td>
<td><span @class(['badge', 'off' => ! $plan->is_active])>{{ $plan->is_active ? 'Visible' : 'Masqué' }}</span></td>
<td><div class="acts">
<a class="btn icon" href="{{ route('admin.plans.edit', $plan) }}" aria-label="Modifier" title="Modifier">@include('backend.partials.icon', ['name' => 'pencil'])</a>
<form method="POST" action="{{ route('admin.plans.active', $plan) }}">@csrf @method('PATCH')
@if($plan->is_active)
<button class="btn icon" type="submit" aria-label="Supprimer" title="Supprimer" onclick="return confirm('Supprimer cette offre ? Vous pourrez la restaurer.')">@include('backend.partials.icon', ['name' => 'trash'])</button>
@else
<button class="btn icon restore" type="submit" aria-label="Restaurer" title="Restaurer">@include('backend.partials.icon', ['name' => 'restore'])</button>
@endif
</form>
</div></td>
</tr>
@empty
<tr><td colspan="5" class="empty">Aucune offre pour le moment. Ajoutez la première.</td></tr>
@endforelse
</tbody>
</table>
</div>
@endsection