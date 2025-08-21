<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
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

        $this->redirectIntended(default: route('dashboard', absolute: false));
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

<x-slot name="title">
    {{ __('common.login') }}
</x-slot>

<section class="auth bg-base d-flex flex-wrap">
    <div class="auth-left d-lg-block d-none">
        <div class="d-flex align-items-center flex-column h-100 justify-content-center">
            <img src="{{ asset('assets/common/images/auth/auth-img.jpg') }}" alt="">
        </div>
    </div>

    <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
        <div class="max-w-464-px mx-auto w-100">
            <div>
                <a href="{{ route('agent.index') }}" class="mb-40 max-w-290-px">
                    <img src="{{ asset('assets/common/logos/ulogo.png') }}" alt="">
                </a>
                <h4 class="mb-12">{{ __('common.login_title') }}</h4>
                <p class="mb-32 text-secondary-light text-lg">{{ __('common.login_description') }}</p>
            </div>

            <form wire:submit="login">

                <div class="icon-field mb-2">
                    <span class="icon top-50 translate-middle-y">
                        <iconify-icon icon="mage:email"></iconify-icon>
                    </span>
                    <input type="email" id="email" wire:model="email"
                        class="form-control h-56-px bg-neutral-50 radius-12" placeholder="{{ __('common.email') }}">
                </div>

                @error('email')
                    <div class="text-danger mt-2 mb-0">{{ $message }}</div>
                @enderror

                <div class="position-relative mb-2 mt-16">
                    <div class="icon-field">
                        <span class="icon top-50 translate-middle-y">
                            <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                        </span>

                        <input type="password" class="form-control h-56-px bg-neutral-50 radius-12" id="password"
                            wire:model="password" placeholder="{{ __('common.password') }}">
                    </div>

                    @error('password')
                        <div class="text-danger mt-2 mb-0">{{ $message }}</div>
                    @enderror

                    <span
                        class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light"
                        data-toggle="#password"></span>
                </div>

                <div class="">
                    <div class="d-flex justify-content-between gap-2">
                        <div class="form-check style-check d-flex align-items-center">
                            <input class="form-check-input border border-neutral-300" type="checkbox" value=""
                                id="remeber" name="remeber">

                            <label class="form-check-label" for="remeber">{{ __('common.remember_me') }}</label>
                        </div>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-primary-600 fw-medium">
                                {{ __('common.forgot_your_password') }}
                            </a>
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-primary-600 text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32">
                    {{ __('common.login') }}
                </button>

                {{-- <div class="mt-32 center-border-horizontal text-center">
                    <span class="bg-base z-1 px-4">Or sign in with</span>
                </div>

                <div class="mt-32 d-flex align-items-center gap-3">
                    <button type="button"
                        class="fw-semibold text-primary-light py-16 px-24 w-50 border radius-12 text-md d-flex align-items-center justify-content-center gap-12 line-height-1 bg-hover-primary-50">
                        <iconify-icon icon="ic:baseline-facebook"
                            class="text-primary-600 text-xl line-height-1"></iconify-icon>
                        Google
                    </button>
                    <button type="button"
                        class="fw-semibold text-primary-light py-16 px-24 w-50 border radius-12 text-md d-flex align-items-center justify-content-center gap-12 line-height-1 bg-hover-primary-50">
                        <iconify-icon icon="logos:google-icon"
                            class="text-primary-600 text-xl line-height-1"></iconify-icon>
                        Google
                    </button>
                </div>

                <div class="mt-32 text-center text-sm">
                    <p class="mb-0">Don’t have an account? <a href="sign-up.html"
                            class="text-primary-600 fw-semibold">Sign Up</a></p>
                </div> --}}

            </form>
        </div>
    </div>
</section>