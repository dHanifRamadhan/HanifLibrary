<?php

namespace App\Http\Controllers\Services\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class acceptMailsServices extends Controller
{
    public function accept($id)
    {
        $status = null;
        $data = DB::table('users')->where('id', $id)->first();

        if ($data == null) {
            $status = 'error';
        } else {
            if ($data->email_verified_at == null) {
                if ((Carbon::now()->toDateString() > $data->email_expired) || ($data->status_verification == 'failed')) {
                    $status = 'failed';
                } else if ($data->status_verification == 'already') {
                    DB::table('users')
                        ->where('id', $id)
                        ->where('status_verification', 'already')
                        ->whereNull('email_verified_at')
                        ->whereNull('deleted_at')
                        ->update([
                            'status_verification' => 'accepted',
                            'email_verified_at' => now(),
                            'email_expired' => null,
                            'updated_at' => now(),
                        ]);    
    
                    $status = 'already';
                }
            } else {
                $status = 'accept';
            }
        }
        
        return $status;
    }

    public function failed($id) {
        $data = DB::table('users')->where('id', $id)->whereNull('email_verified_at')->whereNotNull('email_expired')->whereNull('deleted_at')->first();

        DB::table('users')->where('id', $id)->whereNull('email_verified_at')->whereNotNull('email_expired')->whereNull('deleted_at')->update([
            'status_verification' => 'already',
            'email_expired' => Carbon::now()->toDateString(),
        ]);

        $data = (object)[
            'id' => $data->id,
            'email' => $data->email,
        ];

        return $data;
    }   
}
