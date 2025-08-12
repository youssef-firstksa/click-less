<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth.master')] class extends Component {
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        Password::sendResetLink($this->only('email'));

        session()->flash('status', __('A reset link will be sent if the account exists.'));
    }
}; ?>

<x-slot name="title">
    {{ __('common.forgot_password_title') }}
</x-slot>


<section class="auth forgot-password-page bg-base d-flex flex-wrap">
    <div class="auth-left d-lg-block d-none">
        <div class="d-flex align-items-center flex-column h-100 justify-content-center">
            <img src="{{ asset('assets/common/images/auth/forgot-pass-img.png') }}" alt="">
        </div>
    </div>
    <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
        <div class="max-w-464-px mx-auto w-100">

            <div>
                <h4 class="mb-12">{{ __('common.forgot_password_title') }}</h4>
                <p class="mb-32 text-secondary-light text-lg">{{ __('common.forgot_password_description') }}</p>
            </div>

            <form wire:submit="sendPasswordResetLink">
                <div class="icon-field">
                    <span class="icon top-50 translate-middle-y">
                        <iconify-icon icon="mage:email"></iconify-icon>
                    </span>
                    <input type="email" wire:model="email" class="form-control h-56-px bg-neutral-50 radius-12"
                        placeholder="{{ __('common.email') }}">
                </div>

                @error('email')
                    <div class="text-danger mt-2 mb-0">{{ $message }}</div>
                @enderror

                <button class="btn btn-primary-600 text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">

                    {{ __('common.continue') }}
                </button>

                <div class="text-center">
                    <a href="{{ route('login') }}"
                        class="text-primary-600 fw-bold mt-24">{{ __('common.back_to_login') }}</a>
                </div>
            </form>
        </div>
    </div>
</section>
