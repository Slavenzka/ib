<?php

namespace App\Http\Middleware;

use Closure;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        app()->setLocale(session()->get('locale', config('app.locale')));

        if (app('router')->currentRouteNamed('admin.*')) {
            app()->setLocale('ru');
        }

        return $next($request);
    }
}
