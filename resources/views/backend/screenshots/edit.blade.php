@extends('backend.layouts.app')
@section('title', 'Captures d’écran · modifier')
@section('content')
<form class="card" method="POST" action="{{ route('admin.screenshots.update', $screenshot) }}" enctype="multipart/form-data">
@csrf
@method('PUT')
@include('backend.screenshots._form')
</form>
@endsection
