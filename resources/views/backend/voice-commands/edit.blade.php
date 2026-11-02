@extends('backend.layouts.app')
@section('title', 'Commandes vocales · modifier')
@section('content')
<form class="card" method="POST" action="{{ route('admin.voice-commands.update', $voice_command) }}">
@csrf
@method('PUT')
@include('backend.voice-commands._form')
</form>
@endsection
