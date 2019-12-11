<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $roles = explode('|', $role);

        if (!\Auth::user()->hasRole($roles)) {
            return back()->withErrors(__('auth.permission'));
        }

        return $next($request);
    }
}
