@props(['data'])

<div {{ $attributes->merge([]) }}>
    {{ $data->appends(request()->query())->links() }}
</div>