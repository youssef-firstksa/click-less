<x-trans-js />

<!-- jQuery library js -->
<script src="{{ asset('assets/common/js/lib/jquery-3.7.1.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ asset('assets/common/js/lib/bootstrap.bundle.min.js') }}"></script>
<!-- Apex Chart js -->
<script src="{{ asset('assets/common/js/lib/apexcharts.min.js') }}"></script>
<!-- Data Table js -->
<script src="{{ asset('assets/common/js/lib/dataTables.min.js') }}"></script>
<!-- Iconify Font js -->
<script src="{{ asset('assets/common/js/lib/iconify-icon.min.js') }}"></script>
<!-- jQuery UI js -->
<script src="{{ asset('assets/common/js/lib/jquery-ui.min.js') }}"></script>
<!-- Popup js -->
<script src="{{ asset('assets/common/js/lib/magnifc-popup.min.js') }}"></script>
<!-- Slick Slider js -->
<script src="{{ asset('assets/common/js/lib/slick.min.js') }}"></script>
<!-- prism js -->
<script src="{{ asset('assets/common/js/lib/prism.js') }}"></script>
<!-- file upload js -->
<script src="{{ asset('assets/common/js/lib/file-upload.js') }}"></script>
<!-- audioplayer -->
<script src="{{ asset('assets/common/js/lib/audioplayer.js') }}"></script>

<!-- Select2  -->
<script src="{{ asset('assets/common/js/lib/select2.min.js') }}"></script>
<script src="{{ asset('assets/common/js/select2-global.js') }}"></script>
<!-- main js -->
<script src="{{ asset('assets/common/js/app.js') }}"></script>

<x-sweet-alert />

@stack('scripts')
