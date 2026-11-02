@extends('backend.layouts.app')
@section('title', 'Fonctionnalités · modifier')
@section('content')
<form class="card" method="POST" action="{{ route('admin.features.update', $feature) }}">
@csrf
@method('PUT')
@include('backend.features._form')
</form>
@endsection
