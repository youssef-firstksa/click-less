@props(['route', 'model' => null])

<a href="{{ $route }}" {{ $attributes->merge(['class' => 'bg-primary-50 bg-hover-primary-200 text-primary-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle']) }}>
    <iconify-icon icon="majesticons:eye-line" class="icon text-xl"></iconify-icon>
</a>