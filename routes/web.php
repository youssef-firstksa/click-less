<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;




Route::prefix(LaravelLocalization::setLocale())
    ->middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'localize'])
    ->group(function () {

        Route::middleware(['auth', 'platform-access'])->group(function () {
            Route::get('/', function () {
                return view('agent.index');
            })->name('frontend.index');
        });
    });

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
