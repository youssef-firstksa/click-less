@props(['notifications'])

<div class="max-h-400-px overflow-y-auto scroll-sm pe-4">

    @foreach ($notifications as $notification)
        <x-notifications.item :notification="$notification" />
    @endforeach

</div>