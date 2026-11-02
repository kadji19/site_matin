@extends('backend.layouts.app')
@section('title', 'FAQ · nouvelle entrée')
@section('content')
<form class="card" method="POST" action="{{ route('admin.faqs.store') }}">
@csrf
@include('backend.faqs._form')
</form>
@endsection
