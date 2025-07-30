@props(['route', 'model' => null])

<form action="{{ $route }}" method="POST">
    @csrf
    @method('DELETE')

    <button {{ $attributes->merge(['class' => 'remove-item-btn bg-danger-focus bg-hover-danger-200 text-danger-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle']) }}>
        <iconify-icon icon="fluent:delete-24-regular" class="menu-icon"></iconify-icon>
    </button>
</form>