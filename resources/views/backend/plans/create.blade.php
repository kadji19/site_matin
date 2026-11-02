@extends('backend.layouts.app')
@section('title', 'Tarifs · nouvelle offre')
@section('content')
<form class="card" method="POST" action="{{ route('admin.plans.store') }}">
@csrf
@include('backend.plans._form')
</form>
@endsection