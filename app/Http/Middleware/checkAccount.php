<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

use function PHPUnit\Framework\isEmpty;

class checkAccount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $data = DB::table('users')->whereNull('email_verified_at')->whereNotNull('email_expired')->get();
        $selection = [];
        foreach ($data as $key => $value) {
            if (Carbon::now()->toDateString() > $value->email_expired) {
                $selection = [
                    $value->id
                ];
            }
        }

        DB::table('users')->whereIn('id', $selection)->update([
            'status_verification' => 'failed'
        ]);
        
        return $next($request);
    }
}
