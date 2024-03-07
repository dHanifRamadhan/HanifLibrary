<?php

namespace App\Http\Controllers\Services\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class loginServices extends Controller
{
    public function login(Request $request)
    {
        $login = (object)[];

        switch ($request->choose) {
            case 'username':
                $login->account = DB::table('users')->where('username', $request->inputAccount)->count();

                $login->path = [
                    'username' => $request->inputAccount, 
                    'password' => $request->password,
                ];

                $login->validasi = DB::table('users')->select('email_verified_at', 'deleted_at')->where('username', $request->inputAccount)->first();

                $login->message = [
                    '0' => 'Account with username ' . $request->inputAccount . ' not yet registered!',
                    '1' => 'Account with username ' . $request->inputAccount . ' has been deleted by admin',
                ];

                break;
            case 'email':
                $login->account = DB::table("users")->where("email", $request->inputAccount)->count();
                
                $login->path = [
                    'email' => $request->inputAccount, 
                    'password' => $request->password,
                ];

                $login->validasi = DB::table('users')->select('email_verified_at', 'deleted_at')->where('email', $request->inputAccount)->first();

                $login->message = [
                    '0' => 'Account with email ' . $request->inputAccount . ' not yet registered!',
                    '1' => 'Account with email ' . $request->inputAccount . ' has been deleted by admin',
                ];
                break;
        }

        return $login;
    }
}
