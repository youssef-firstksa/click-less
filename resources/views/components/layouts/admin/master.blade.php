<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" data-theme="light">

<head>
    <x-layouts.admin.head title="{{$title ?? '' }}" />
</head>

<body>
    <x-layouts.admin.sidebar />

    <main class="dashboard-main">
        <x-layouts.admin.header />

        <div class="dashboard-main-body">
            <x-layouts.admin.page-head />

            {{ $slot }}
        </div>

        <x-layouts.admin.footer />
    </main>

    <x-layouts.admin.scripts />

</body>

</html>