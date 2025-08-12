<?php

use App\Http\Middleware\PlatformAccessLevel;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

function handleAuthRedirect(Middleware $middleware)
{
    $middleware->redirectUsersTo(function () {
        return route('agent.index');
    });

    $middleware->redirectGuestsTo(function () {
        return route('login');
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
        'platform-access' => PlatformAccessLevel::class,
    ]);
}

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware(['web', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'localize'])
                ->prefix(LaravelLocalization::setLocale() . '/dashboard')
                ->as('dashboard.')
                ->group(base_path('routes/dashboard.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        handleAuthRedirect($middleware);
        handleMiddlewareAlias($middleware);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
