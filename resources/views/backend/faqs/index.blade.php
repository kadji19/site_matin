@extends('backend.layouts.app')
@section('title', 'FAQ')
@section('content')
<div class="head"><span>{{ $faqs->count() }} élément(s)</span>
<a class="btn" href="{{ route('admin.faqs.create') }}">@include('backend.partials.icon', ['name' => 'plus']) Ajouter</a></div>
<div class="card">
<table>
<thead><tr><th>Position</th><th>Question</th><th>Statut</th><th>Actions</th></tr></thead>
<tbody>
@forelse($faqs as $faq)
<tr>
<td>{{ $faq->sort_order }}</td>
<td>{{ \Illuminate\Support\Str::limit($faq->question, 70) }}</td>
<td><span @class(['badge', 'off' => ! $faq->is_active])>{{ $faq->is_active ? 'Visible' : 'Masqué' }}</span></td>
<td><div class="acts">
<a class="btn icon" href="{{ route('admin.faqs.edit', $faq) }}" aria-label="Modifier" title="Modifier">@include('backend.partials.icon', ['name' => 'pencil'])</a>
<a class="btn icon" href="{{ route('admin.faqs.active', $faq) }}" aria-label="Supprimer" title="Supprimer">
    @if($faq->is_active)
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
