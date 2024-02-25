<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\acceptEmailUsers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class acceptEmailController extends Controller
{
    public function sendMails() {
        $data = (object)[
            'id' => 1,
            'name' => 'Hanif Ramadhan'
        ];

        Mail::to('d.haniframadhan@gmail.com')->send(new acceptEmailUsers($data));

        dd('berhasil');
    }

    public function emailVerified($id)
    {
        $check = DB::table("users AS a")
        ->join('accept_email AS b', 'b.user_id', '=', 'a.id')
        ->where('a.id', $id)
        ->first();

        if ($check->email_verified_at == null) {
            if (now() < Carbon::parse($check->email_verified_date)->addDay(1)) {
                DB::table('users')->where('id', $id)->update([
                    'email_verified_at' => now(),
                ]);
    
                DB::table('accept_email')->where('user_id', $id)->delete();
    
                return view('debug.email-verified')->with([
                    'message' => 'Your account has been successfully verified'
                ]);
            } else {
                DB::table('users')->where('id', $id)->delete();
    
                return view('debug.email-verified')->with([
                    'message' => 'link has expired please re-register'
                ]);
            }
        }

        return view('debug.email-verified')->with([
            'message' => 'Your account has been verified'
        ]);
    }
}
