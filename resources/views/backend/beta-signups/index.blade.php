@extends('backend.layouts.app')
@section('title', 'Inscrits à la bêta')
@section('content')
@php $actifs = $signups->whereNull('unsubscribed_at'); @endphp
<div class="head">
<span>{{ $actifs->count() }} inscrit(s) · {{ $actifs->where('os', 'android')->count() }} Android · {{ $actifs->where('os', 'ios')->count() }} iPhone</span>
{{-- <a class="btn" href="{{ route('admin.beta-signups.export') }}">@include('backend.partials.icon', ['name' => 'download']) Exporter en CSV</a> --}}
</div>
<div class="card">
<table>
<thead><tr><th>Date</th><th>Prénom</th><th>Contact</th><th>Téléphone</th><th>Statut</th></tr></thead>
<tbody>
@forelse($signups as $signup)
<tr>
<td>{{ $signup->created_at->locale('fr')->translatedFormat('j M Y') }}</td>
<td>{{ $signup->first_name }}</td>
<td>{{ $signup->contact }}</td>
<td>{{ $signup->os === 'ios' ? 'iPhone' : 'Android' }}</td>
<td><span @class(['badge', 'off' => $signup->unsubscribed_at])>{{ $signup->unsubscribed_at ? 'Désinscrit' : 'Inscrit' }}</span></td>
</tr>
@empty
<tr><td colspan="5" class="empty">Aucune inscription pour le moment.</td></tr>
@endforelse
</tbody>
</table>
</div>
@endsection