<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

function handleAuthRedirect(Middleware $middleware)
{
    $middleware->redirectUsersTo(function () {
        return auth()->guard('admin')->user() ? route('admin.dashboard') : route('frontend.index');
    });

    $middleware->redirectGuestsTo(function () {
        $isAdmin = request()->is('admin') || request()->is('*/admin') || request()->is('admin/*') || request()->is('*/admin/*');
        return $isAdmin ? route('admin.auth.login') : route('login');
    });
}

function handleMiddlewareAlias(Middleware $middleware)
{
    $middleware->alias([
        'localize'                => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes::class,
        'localizationRedirect'    => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class,
        'localeSessionRedirect'   => \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
        'localeCookieRedirect'    => \Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect::class,
        'localeViewPath'          => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath::class,
    ]);
}

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware(['web', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'localize'])
                ->prefix(LaravelLocalization::setLocale() . '/admin')
                ->as('admin.')
                ->group(base_path('routes/admin.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        handleAuthRedirect($middleware);
        handleMiddlewareAlias($middleware);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
