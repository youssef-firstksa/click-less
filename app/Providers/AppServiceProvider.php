<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Livewire::setUpdateRoute(function ($handle) {
            return Route::post(LaravelLocalization::setLocale() . '/livewire/update', $handle)
                ->middleware([
                    'web',
                    'localeSessionRedirect',
                    'localizationRedirect',
                    'localeViewPath',
                    'localize'
                ]);
        });

        Paginator::useBootstrapFive();
    }
}
