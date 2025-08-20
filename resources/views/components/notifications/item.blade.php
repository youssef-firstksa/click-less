@props(['notification'])

<a href="javascript:void(0)"
    class="notifications-list-item px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">

    <div class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">

        <x-notifications.icon :notification="$notification" />

        <div>
            <h6 class="notification-title text-md fw-semibold mb-4">
                {{$notification->title}}
            </h6>

            <p class="notification-description mb-0 text-sm text-secondary-light text-w-200-px">
                {{$notification->shortDescription}}
            </p>
        </div>
    </div>

    <span class="notification-date text-sm text-secondary-light flex-shrink-0">
        {{ $notification->publishedAt() }}
    </span>
</a>