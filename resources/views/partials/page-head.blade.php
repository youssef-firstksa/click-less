@props(['title' => ''])

@if ($title)
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">{{ $title }}</h6>

        <ul class="d-flex align-items-center gap-2">

            @if (request()->routeIs('dashboard.*'))
                <li class="fw-medium">
                    <a href="{{ route('dashboard.index') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        {{ __('dashboard.general.dashboard') }}
                    </a>
                </li>
            @else
                <li class="fw-medium">
                    <a href="{{ route('agent.index') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        {{ __('agent.general.home') }}
                    </a>
                </li>
            @endif

            @if (!request()->routeIs('dashboard.index') && !request()->routeIs('agent.index'))
                <li>-</li>
                <li class="fw-medium">{{ $title }}</li>
            @endif
        </ul>
    </div>
@endif
