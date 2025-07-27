<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}"
    style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">


<head>
    <x-layouts.admin.head />
</head>

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default" style="background-color: #fcfcfc">


    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">

        <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">

            <x-layouts.admin.header />

            <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">

                <x-layouts.admin.sidebar />

                <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">

                        @if (isset($title))
                            <x-layouts.admin.toolbar :title="$title" />
                        @endif

                        <div id="kt_app_content" class="app-content  flex-column-fluid ">
                            <div id="kt_app_content_container" class="app-container  container-fluid ">
                                {{$slot}}
                            </div>
                        </div>

                        <x-layouts.admin.footer />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-layouts.admin.scripts />
    <!--end::Javascript-->
</body>

</html>