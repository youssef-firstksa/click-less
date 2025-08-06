<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{config('app.name')}} {{$title ? " | {$title}" : ''}}</title>
<link rel="icon" type="image/png" href="{{ asset('assets/dashboard/images/favicon.png') }}" sizes="16x16">
<!-- remix icon font css  -->
<link rel="stylesheet" href="{{ asset('assets/dashboard/css/remixicon.css') }}">
<!-- BootStrap css -->
<link rel="stylesheet" href="{{ asset('assets/dashboard/css/lib/bootstrap.min.css') }}">
<!-- Apex Chart css -->
<link rel="stylesheet" href="{{ asset('assets/dashboard/css/lib/apexcharts.css') }}">
<!-- Data Table css -->
<link rel="stylesheet" href="{{ asset('assets/dashboard/css/lib/dataTables.min.css') }}">
<!-- Text Editor css -->
<link rel="stylesheet" href="{{ asset('assets/dashboard/css/lib/editor-katex.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/dashboard/css/lib/editor.atom-one-dark.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/dashboard/css/lib/editor.quill.snow.css') }}">
<!-- Date picker css -->
<link rel="stylesheet" href="{{ asset('assets/dashboard/css/lib/flatpickr.min.css') }}">
<!-- Calendar css -->
<link rel="stylesheet" href="{{ asset('assets/dashboard/css/lib/full-calendar.css') }}">
<!-- Popup css -->
<link rel="stylesheet" href="{{ asset('assets/dashboard/css/lib/magnific-popup.css') }}">
<!-- Slick Slider css -->
<link rel="stylesheet" href="{{ asset('assets/dashboard/css/lib/slick.css') }}">
<!-- prism css -->
<link rel="stylesheet" href="{{ asset('assets/dashboard/css/lib/prism.css') }}">
<!-- file upload css -->
<link rel="stylesheet" href="{{ asset('assets/dashboard/css/lib/file-upload.css') }}">
<link rel="stylesheet" href="{{ asset('assets/dashboard/css/lib/audioplayer.css') }}">
<!-- Select2  -->
<link rel="stylesheet" href="{{ asset('assets/dashboard/css/lib/select2.min.css') }}">
<!-- main css -->
<link rel="stylesheet" href="{{ asset('assets/dashboard/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/dashboard/css/custom.css') }}">

@stack('head')
@stack('styles')