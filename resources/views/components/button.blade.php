@props(['href' => null, 'size' => 'btn-sm'])

@php
    $classes = "btn {$size} px-12 py-12 radius-8 d-flex align-items-center gap-2";
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif