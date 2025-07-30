@props(['route', 'model' => null, 'can' => null])

@if(!$can || (auth()->guard('admin')->check() && auth()->guard('admin')->user()->can($can)))
<a href="{{ $route }}" {{ $attributes->merge(['class' => 'bg-info-focus bg-hover-info-200 text-info-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle']) }}>
    <iconify-icon icon="majesticons:eye-line" class="icon text-xl"></iconify-icon>
</a>
@endcan