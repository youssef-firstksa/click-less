<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    use \Mcamara\LaravelLocalization\Traits\LoadsTranslatedCachedRoutes;

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
        Gate::before(function (User $user, string $ability) {
            // Only return true for super-admin, let other checks continue
            if ($user->role->name === 'super-admin') {
                return true;
            }

            // Return null to allow normal policy checks to proceed
            return null;
        });

        RouteServiceProvider::loadCachedRoutesUsing(fn() => $this->loadCachedRoutes());

        if (request()->is('admin/*', '*/admin/*')) {
            // Use Admin Bootstrap Pagination for the admin dashboard
            Paginator::defaultView('vendor.pagination.admin-bootstrap-5');
        } else {
            // Use Bootstrap Five for the main website
            Paginator::useBootstrapFive();
        }

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
    }
}
