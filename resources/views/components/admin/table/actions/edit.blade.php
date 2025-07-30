@props(['route', 'model' => null, 'can' => null])

@if(!$can || (auth()->guard('admin')->check() && auth()->guard('admin')->user()->can($can)))
    <a href="{{ $route }}" {{ $attributes->merge(['class' => 'bg-success-focus text-success-600 bg-hover-success-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle'])}}>
        <iconify-icon icon="lucide:edit" class="menu-icon"></iconify-icon>
    </a>
@endif