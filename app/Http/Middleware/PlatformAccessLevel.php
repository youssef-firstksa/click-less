<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlatformAccessLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($request->routeIs('dashboard.*') && $user->hasPermissionTo('access-dashboard-platform')) {
            return $next($request);
        }

        if (!$request->routeIs('dashboard.*') && $user->hasPermissionTo('access-agent-platform')) {
            return $next($request);
        }

        if ($user->hasRole('super-admin')) {
            return $next($request);
        }

        abort(403);
    }
}
