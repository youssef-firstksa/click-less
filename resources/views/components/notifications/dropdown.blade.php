<div class="dropdown">
    <button
        class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"
        type="button" data-bs-toggle="dropdown">

        <iconify-icon icon="iconoir:bell" class="text-primary-light text-xl"></iconify-icon>
    </button>

    <div class="dropdown-menu to-top dropdown-menu-lg p-0">
        <div
            class="m-16 py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
            <div>
                <h6 class="text-lg text-primary-light fw-semibold mb-0">
                    {{ __('dashboard.general.notifications') }}
                </h6>
            </div>
            <span
                class="text-primary-600 fw-semibold text-lg w-40-px h-40-px rounded-circle bg-base d-flex justify-content-center align-items-center">

                {{ $notifications->count() }}

            </span>
        </div>

        <x-notifications.list :notifications="$notifications" />

        <div class="text-center py-12 px-16">
            <a href="javascript:void(0)" class="text-primary-600 fw-semibold text-md">
                {{ __('dashboard.general.see_all_notifications') }}
            </a>
        </div>

    </div>
</div>