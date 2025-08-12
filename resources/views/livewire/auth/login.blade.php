<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth.master')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email) . '|' . request()->ip());
    }
}; ?>

<!--begin::Authentication - Sign-in -->
<div class="d-flex flex-column flex-lg-row flex-column-fluid">
    <!--begin::Aside-->
    <div class="d-flex flex-lg-row-fluid">
        <!--begin::Content-->
        <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
            <!--begin::Image-->
            <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                src="{{ asset('assets/agent/media/auth/agency.png') }}" alt="" />
            <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                src="{{ asset('assets/agent/media/auth/agency-dark.png') }}" alt="" />
            <!--end::Image-->

            <!--begin::Title-->
            <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">
                Fast, Efficient and Productive
            </h1>
            <!--end::Title-->

            <!--begin::Text-->
            <div class="text-gray-600 fs-base text-center fw-semibold">
                In this kind of post, <a href="#" class="opacity-75-hover text-primary me-1">the blogger</a>

                introduces a person they’ve interviewed <br /> and provides some background information about

                <a href="#" class="opacity-75-hover text-primary me-1">the interviewee</a>
                and their <br /> work following this is a transcript of the interview.
            </div>
            <!--end::Text-->
        </div>
        <!--end::Content-->
    </div>
    <!--begin::Aside-->

    <!--begin::Body-->
    <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
        <!--begin::Wrapper-->
        <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                <!--begin::Wrapper-->
                <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">

                    <!--begin::Form-->
                    <form wire:submit="login" class="form w-100" novalidate="novalidate" id="kt_sign_in_form">
                        <!--begin::Heading-->
                        <div class="text-center mb-11">
                            <!--begin::Title-->
                            <h1 class="text-gray-900 fw-bolder mb-3">
                                {{ __('Log in to your account') }}
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
                            <input type="email" placeholder="{{ __('Email address') }}" wire:model="email" autofocus
                                autocomplete="off" class="form-control bg-transparent" />
                            <!--end::Email-->
                            @error('email')
                                <div class="text-danger mt-2 mb-0">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--end::Input group--->
                        <div class="fv-row mb-3">
                            <!--begin::Password-->
                            <input type="password" placeholder="{{ __('Password') }}" wire:model="password"
                                autocomplete="off" class="form-control bg-transparent" />
                            <!--end::Password-->
                            @error('password')
                                <div class="text-danger mt-2 mb-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <!--end::Input group--->

                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                            <div></div>


                            @if (Route::has('password.request'))
                                <!--begin::Link-->
                                <a href="{{ route('password.request') }}" class="link-primary">
                                    {{ __('Forgot your password?') }}
                                </a>
                                <!--end::Link-->
                            @endif

                        </div>
                        <!--end::Wrapper-->

                        <!--begin::Submit button-->
                        <div class="d-grid mb-10">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">

                                <!--begin::Indicator label-->
                                <span class="indicator-label">
                                    {{ __('Log in') }}
                                </span>
                                <!--end::Indicator label-->

                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">
                                    Please wait... <span
                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                                <!--end::Indicator progress--> </button>
                        </div>
                        <!--end::Submit button-->

                        <!--begin::Sign up-->
                        {{-- <div class="text-gray-500 text-center fw-semibold fs-6">
                            {{ __('Don\'t have an account?') }}

                            <a href="sign-up.html" class="link-primary">
                                {{ __('Sign up') }}
                            </a>
                        </div> --}}
                        <!--end::Sign up-->
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
