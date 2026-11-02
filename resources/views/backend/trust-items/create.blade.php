@extends('backend.layouts.app')
@section('title', 'Bandeau de réassurance · nouvelle entrée')
@section('content')
<form class="card" method="POST" action="{{ route('admin.trust-items.store') }}">
@csrf
@include('backend.trust-items._form')
</form>
@endsection
