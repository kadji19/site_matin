@extends('backend.layouts.app')
@section('title', 'Sécurité et vie privée · nouvelle entrée')
@section('content')
<form class="card" method="POST" action="{{ route('admin.security-points.store') }}">
@csrf
@include('backend.security-points._form')
</form>
@endsection
