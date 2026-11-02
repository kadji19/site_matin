@extends('backend.layouts.app')
@section('title', 'Commandes vocales · nouvelle entrée')
@section('content')
<form class="card" method="POST" action="{{ route('admin.voice-commands.store') }}">
@csrf
@include('backend.voice-commands._form')
</form>
@endsection
