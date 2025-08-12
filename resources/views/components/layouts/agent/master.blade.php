<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" data-theme="light">

<head>
    @include('partials.head')
    @include('agent.partials.styles')
</head>

<body>
    <main class="dashboard-main">
        @include('partials.header')

        <div class="dashboard-main-body">
            @include('partials.page-head')

            {{ $slot }}
        </div>

        @include('partials.footer')
    </main>

    @include('partials.scripts')
    @include('agent.partials.scripts')

</body>

</html>
