@props(['notification'])

<div>
    @if ($notification->notification_type->value === 'success')
        <span
            class="w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
            <iconify-icon icon="bitcoin-icons:verify-outline" class="icon text-xxl"></iconify-icon>
        </span>
    @endif

    @if ($notification->notification_type->value === 'info')
        <span
            class="w-44-px h-44-px bg-primary-subtle text-primary-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
            <iconify-icon icon="solar:info-circle-linear" class="icon text-xxl"></iconify-icon>
        </span>
    @endif

    @if ($notification->notification_type->value === 'warning')
        <span
            class="w-44-px h-44-px bg-warning-subtle text-warning-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
            <iconify-icon icon="solar:shield-warning-linear" class="icon text-xxl"></iconify-icon>
        </span>
    @endif

    @if ($notification->notification_type->value === 'error')
        <span
            class="w-44-px h-44-px bg-danger-subtle text-danger-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
            <iconify-icon icon="solar:close-circle-outline" class="icon text-xxl"></iconify-icon>
        </span>
    @endif
</div>