@props(['messages' => []])

@if (count($messages) > 0)
    <ul {{ $attributes->merge(['class' => 'text-xs text-danger mt-1']) }}>
        @foreach ($messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif