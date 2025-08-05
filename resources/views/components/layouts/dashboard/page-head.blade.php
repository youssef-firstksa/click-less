@props(['title' => ''])

@if ($title)
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">{{$title}}</h6>

        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="{{ route('dashboard.dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    {{ __('dashboard.general.dashboard') }}
                </a>
            </li>

            @if (!request()->routeIs('admin.dashboard'))
                <li>-</li>
                <li class="fw-medium">{{$title}}</li>
            @endif
        </ul>
    </div>
@endif