@extends('backend.layouts.app')
@section('title', 'Bandeau de réassurance · modifier')
@section('content')
<form class="card" method="POST" action="{{ route('admin.trust-items.update', $trustItem) }}">
@csrf
@method('PUT')
@include('backend.trust-items._form')
</form>
@endsection
