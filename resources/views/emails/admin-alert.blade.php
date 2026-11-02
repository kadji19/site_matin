<h2>{{ $title }}</h2>

@foreach($details as $label => $value)
    <p style="margin:0"><b>{{ $label }} :</b> {{ $value }}</p>
@endforeach

@if($body)
    <p style="white-space:pre-line">{{ $body }}</p>
@endif

@if($url)
    <p><a href="{{ $url }}">Ouvrir dans l'administration</a></p>
@endif