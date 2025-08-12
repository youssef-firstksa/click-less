<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" data-theme="light">

<head>
    @include('partials.head')
</head>

<body>
    @include('partials.sidebar')

    <main class="dashboard-main">
        @include('partials.header')

        <div class="dashboard-main-body">
            @include('partials.page-head')

            {{ $slot }}
        </div>

        @include('partials.footer')
    </main>

    @include('partials.scripts')

</body>

</html>
