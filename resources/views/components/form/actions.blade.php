@props(['backRoute' => null])

<div {{ $attributes->merge(['class' => 'd-flex gap-2 mt-6']) }}>
    {{ $slot }}

    <x-button href="{{ $backRoute ? route($backRoute) : URL::previous() }}" class="btn-dark">
        {{ __('dashboard.general.back') }}
        </x-dashboard.button>
</div>
