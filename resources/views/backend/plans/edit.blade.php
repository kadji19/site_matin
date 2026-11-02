@extends('backend.layouts.app')
@section('title', 'Tarifs · modifier')
@section('content')
<form class="card" method="POST" action="{{ route('admin.plans.update', $plan) }}">
@csrf
@method('PUT')
@include('backend.plans._form')
</form>
@endsection