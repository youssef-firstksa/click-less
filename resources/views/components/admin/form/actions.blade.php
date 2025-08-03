@props(['backRoute' => null])

<div {{ $attributes->merge(['class' => 'd-flex gap-2 mt-6']) }}>
    {{ $slot }}

    <x-admin.button href="{{ $backRoute ? route($backRoute) : URL::previous() }}" class="btn-secondary">
        {{__('admin.general.back')}}
    </x-admin.button>
</div>