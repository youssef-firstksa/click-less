<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ config('app.name') }} {{ $title ? " | {$title}" : '' }}</title>
<link rel="icon" type="image/png" href="{{ asset('assets/common/logos/favicon.png') }}" sizes="16x16">


<!-- remix icon font css  -->
<link rel="stylesheet" href="{{ asset('assets/common/css/remixicon.css') }}">
<!-- BootStrap css -->
<link rel="stylesheet" href="{{ asset('assets/common/css/lib/bootstrap.min.css') }}">
<!-- Apex Chart css -->
<link rel="stylesheet" href="{{ asset('assets/common/css/lib/apexcharts.css') }}">
<!-- Data Table css -->
<link rel="stylesheet" href="{{ asset('assets/common/css/lib/dataTables.min.css') }}">
<!-- Text Editor css -->
<link rel="stylesheet" href="{{ asset('assets/common/css/lib/editor-katex.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/common/css/lib/editor.atom-one-dark.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/common/css/lib/editor.quill.snow.css') }}">
<!-- Date picker css -->
<link rel="stylesheet" href="{{ asset('assets/common/css/lib/flatpickr.min.css') }}">
<!-- Calendar css -->
<link rel="stylesheet" href="{{ asset('assets/common/css/lib/full-calendar.css') }}">
<!-- Popup css -->
<link rel="stylesheet" href="{{ asset('assets/common/css/lib/magnific-popup.css') }}">
<!-- Slick Slider css -->
<link rel="stylesheet" href="{{ asset('assets/common/css/lib/slick.css') }}">
<!-- prism css -->
<link rel="stylesheet" href="{{ asset('assets/common/css/lib/prism.css') }}">
<!-- file upload css -->
<link rel="stylesheet" href="{{ asset('assets/common/css/lib/file-upload.css') }}">
<link rel="stylesheet" href="{{ asset('assets/common/css/lib/audioplayer.css') }}">
<!-- Select2  -->
<link rel="stylesheet" href="{{ asset('assets/common/css/lib/select2.min.css') }}">
<!-- main css -->
<link rel="stylesheet" href="{{ asset('assets/common/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/common/css/custom.css') }}">

<style>
    :root {
        --bank-font-color: {{ auth()->user()->activeBank()->font_color }};
        --bank-background-color: {{ auth()->user()->activeBank()->background_color }};
    }
</style>

@stack('head')
@stack('styles')
