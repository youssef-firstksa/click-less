<?php

use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\Agent\ArticleController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::prefix(LaravelLocalization::setLocale())
    ->as('agent.')
    ->middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'localize'])
    ->group(function () {

        Route::middleware(['auth', 'platform-access'])->group(function () {
            Route::get('/', [AgentController::class, 'index'])->name('index');
            Route::get('update-active-bank', [AgentController::class, 'updateActiveBank'])->name('update-active-bank');

            Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');
            Route::get('articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
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
