@extends('backend.layouts.app')
@section('title', 'FAQ · modifier')
@section('content')
<form class="card" method="POST" action="{{ route('admin.faqs.update', $faq) }}">
@csrf
@method('PUT')
@include('backend.faqs._form')
</form>
@endsection
