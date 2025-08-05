<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" data-theme="light">

<head>
    <x-layouts.dashboard.head title="{{$title ?? '' }}" />
</head>

<body>
    <x-layouts.dashboard.sidebar />

    <main class="dashboard-main">
        <x-layouts.dashboard.header />

        <div class="dashboard-main-body">
            <x-layouts.dashboard.page-head :title="$title ?? ''" />

            {{ $slot }}
        </div>

        <x-layouts.dashboard.footer />
    </main>

    <x-layouts.dashboard.scripts />

</body>

</html>