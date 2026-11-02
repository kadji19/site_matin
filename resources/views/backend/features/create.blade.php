@extends('backend.layouts.app')
@section('title', 'Fonctionnalités · nouvelle entrée')
@section('content')
<form class="card" method="POST" action="{{ route('admin.features.store') }}">
@csrf
@include('backend.features._form')
</form>
@endsection
