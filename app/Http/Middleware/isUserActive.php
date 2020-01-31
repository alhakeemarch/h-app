<?php

namespace App\Http\Middleware;

use Closure;

class isUserActive
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
        if (!auth()->user()) {
            return $next($request);
        }

        if (!auth()->user()->is_active) {
            auth()->logout();
            return redirect()->route('login');
        }
        return $next($request);
    }
}
