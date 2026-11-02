@extends('backend.layouts.app')
@section('title', 'Sécurité et vie privée · modifier')
@section('content')
<form class="card" method="POST" action="{{ route('admin.security-points.update', $security_point) }}">
@csrf
@method('PUT')
@include('backend.security-points._form')
</form>
@endsection
