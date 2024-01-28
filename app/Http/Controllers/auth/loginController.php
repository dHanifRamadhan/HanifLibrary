<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
    //
    public function login(Request $request)
    {
        dd($request);
        $user = DB::table("users")->where("email", $request->email)->get();
        if ($user->count() == 0) {
            return json_encode([
                "code" => 500,
                "status"=> "Error",
                "message"=> "Email berlum terdaftar"
            ]);
        }

        if (Auth::attempt($request->only("email", "password"))) {
            $token = $request->session()->regenerate();

            return json_encode([
                "code"=> 200,
                "status" => "success",
                "token" => $token,
            ], 200);
        }

        return json_encode([
            "code" => 500,
            "status" => "Error",
            "message" => "Email atau password salah"
        ]);
    }

    public function authlogin() {
        return view('debug.login');
    }
}