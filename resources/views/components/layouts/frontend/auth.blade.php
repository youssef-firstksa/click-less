<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: MetronicProduct Version: 8.2.9
Purchase: https://1.envato.market/Vm7VRE
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<!--begin::Head-->

<!-- Mirrored from preview.keenthemes.com/metronic8/demo1/landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Dec 2024 09:09:57 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>{{ config('app.name') }} - The World's #1 Selling Tailwind CSS & Bootstrap Admin Template by KeenThemes
    </title>
    <meta charset="utf-8" />
    <meta name="description" content="
            The most advanced Tailwind CSS & Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo,
            Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions.
            Grab your copy now and get life-time updates for free.
        " />
    <meta name="keywords" content="
            tailwind, tailwindcss, metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js,
            Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates,
            free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button,
            bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon
        " />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="{{ config('app.name') }} - The World's #1 Selling Tailwind CSS & Bootstrap Admin Template by KeenThemes" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="{{ config('app.name') }} by Keenthemes" />
    <link rel="canonical" href="landing.html" />
    <link rel="shortcut icon" href="{{ asset('assets/frontend/media/logos/favicon.ico') }}" />

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" /> <!--end::Fonts-->



    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('assets/frontend/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/frontend/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/frontend/css/custom.css') }}" rel="stylesheet" type="text/css" />

    @if (app()->getLocale() == 'ar')
        <link href="{{asset('assets/frontend/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/frontend/css/custom.rtl.css') }}" rel="stylesheet" type="text/css" />
    @endif





    <!--end::Global Stylesheets Bundle-->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-52YZ3XGZJ6"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-52YZ3XGZJ6');
    </script>
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center">


    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Page bg image-->
        <style>
            body {
                background-image: url("{{ asset('assets/frontend/media/auth/bg10.jpg') }}");
            }
        </style>
        <!--end::Page bg image-->

        <div class="auth-lang">
            @if (app()->getLocale() == 'en')
                <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" class="btn btn-sm btn-primary">
                    AR
                </a>
            @else
                <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" class="btn btn-sm btn-primary">
                    EN
                </a>
            @endif
        </div>



        {{-- Start Content --}}
        {{ $slot }}
        {{-- End Content --}}

    </div>
    <!--end::Root-->

    <!--begin::Javascript-->

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('assets/frontend/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->

    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('assets/frontend/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    <script src="{{ asset('assets/frontend/plugins/custom/typedjs/typedjs.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->


    <script src="{{ asset('assets/frontend/js/custom/landing.js') }}"></script>


    {{--
    <script src="{{ asset('assets/frontend/js/custom/authentication/sign-in/general.js') }}"></script> --}}


    <!--end::Javascript-->
</body>
<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/metronic8/demo1/landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Dec 2024 09:10:07 GMT -->

</html>