@extends('backend.layouts.app')
@section('title', 'Comment ça marche · modifier')
@section('content')
<form class="card" method="POST" action="{{ route('admin.steps.update', $step) }}">
@csrf
@method('PUT')
@include('backend.steps._form')
</form>
@endsection
