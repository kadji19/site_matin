@extends('backend.layouts.app')
@section('title', 'Captures d’écran · nouvelle entrée')
@section('content')
<form class="card" method="POST" action="{{ route('admin.screenshots.store') }}" enctype="multipart/form-data">
@csrf
@include('backend.screenshots._form')
</form>
@endsection
