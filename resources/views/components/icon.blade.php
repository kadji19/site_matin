@props(['name' => null, 'size' => 20, 'stroke' => 2])

@if($name && config("icons.$name"))
<svg class="icon" width="{{ $size }}" height="{{ $size }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="{{ $stroke }}" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">{!! config("icons.$name") !!}</svg>
@endif