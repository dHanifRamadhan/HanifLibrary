<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class checkCategory
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
        $check = DB::table('categories')->whereNull('deleted_at')->count();
        if ($check >= 2) {
            return $next($request);
        }
        return redirect()->route('categories-required');
    }
}
