<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('assets/admin/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/admin/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->

<!--begin::Vendors Javascript(used for this page only)-->
<script src=" {{ asset('assets/admin/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>

<script src="{{ asset('assets/admin/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--end::Vendors Javascript-->

<!--begin::Custom Javascript(used for this page only)-->
<script src="{{ asset('assets/admin/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('assets/admin/js/custom/widgets.js') }}"></script>
<script src="{{ asset('assets/admin/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('assets/admin/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('assets/admin/js/custom/utilities/modals/create-app.js') }}"></script>
<script src=" {{ asset('assets/admin/js/custom/utilities/modals/new-target.js') }}"></script>
<script src="{{asset('assets/admin/js/custom/utilities/modals/users-search.js')}}"></script>
<!--end::Custom Javascript-->