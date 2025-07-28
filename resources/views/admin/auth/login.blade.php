<x-layouts.admin.auth>
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">

        <!--begin::Body-->
        <div
            class="d-flex mx-auto flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
            <!--begin::Wrapper-->
            <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column align-items-stretch w-md-400px">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-center flex-column flex-column-fluid ">

                        <!--begin::Form-->
                        <form action="{{ route('admin.auth.login') }}" method="POST" class="form w-100"
                            novalidate="novalidate" id="kt_sign_in_form">
                            @csrf

                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 class="text-gray-900 fw-bolder mb-3">
                                    {{__('Log in to your account')}}
                                </h1>
                                <!--end::Title-->

                                <!--begin::Subtitle-->
                                <div class="text-gray-500 fw-semibold fs-6">
                                    {{ __('Enter your email and password below to log in') }}
                                </div>
                                <!--end::Subtitle--->
                            </div>
                            <!--begin::Heading-->


                            <!--begin::Input group--->
                            <div class="fv-row mb-5">
                                <!--begin::Email-->
                                <input type="email" placeholder="{{ __('Email address') }}" name="email" autofocus
                                    autocomplete="off" class="form-control bg-transparent" />
                                <!--end::Email-->
                                @error('email')
                                    <div class="text-danger mt-2 mb-0">{{$message}}</div>
                                @enderror
                            </div>

                            <!--end::Input group--->
                            <div class="fv-row mb-3">
                                <!--begin::Password-->
                                <input type="password" placeholder="{{ __('Password') }}" name="password"
                                    autocomplete="off" class="form-control bg-transparent" />
                                <!--end::Password-->
                                @error('password')
                                    <div class="text-danger mt-2 mb-0">{{$message}}</div>
                                @enderror
                            </div>
                            <!--end::Input group--->


                            <!--begin::Submit button-->
                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-dark">

                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">
                                        {{ __('Log in') }}
                                    </span>
                                    <!--end::Indicator label-->
                                </button>
                            </div>
                            <!--end::Submit button-->
                        </form>
                        <!--end::Form-->

                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Authentication - Sign-in-->
</x-layouts.admin.auth>