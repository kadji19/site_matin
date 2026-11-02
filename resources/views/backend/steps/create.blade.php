@extends('backend.layouts.app')
@section('title', 'Comment ça marche · nouvelle entrée')
@section('content')
<form class="card" method="POST" action="{{ route('admin.steps.store') }}">
@csrf
@include('backend.steps._form')
</form>
@endsection
