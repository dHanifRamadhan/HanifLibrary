<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class emailVerified
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
        if (Auth::check() && Auth::user()->email_verified_at == null) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerate();
            return redirect()->route('login');
        }

        return $next($request);
    }
}
