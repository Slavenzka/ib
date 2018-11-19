<?php

namespace App\Http\Middleware;

use App\Models\User\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminUser
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
        /** @var User $user */
        $user = Auth::user();

        if (!$user->hasRole(['admin', 'manager'])) {
            return redirect()->route('app.home');
        }

        return $next($request);
    }
}
