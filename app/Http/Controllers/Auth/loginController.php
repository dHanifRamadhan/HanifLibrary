<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Services\Auth\loginServices;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }

    public function loginPost(Request $request)
    {
        $this->validate($request, [
            'inputAccount' => 'required',
            'password' => 'required'
        ]);

        $service = new loginServices();

        $login = $service->login($request);
        
        if ($login->account == 0) {
            return redirect()->route('auth.login')->with('error', (object)[
                'message' => $login->message[0],
            ]);
        }

        if ($login->validasi->email_verified_at == null && $login->validasi->deleted_at == null) {
            return redirect()->route('auth.login')->with('error', (object)[
                'message' => 'Please check your email and verify!',
            ]);
        } else if ($login->validasi->deleted_at != null) {
            return redirect()->route('auth.login')->with('error', (object)[
                'message' => $login->message[1],
            ]);
        }

        if (Auth::attempt($login->path)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('info', (object)[
                'message' => 'Welcome to the hanif library website!'
            ]);
        }

        return redirect()->route('auth.login')->with('error', (object)[
            'message' => 'Your password or email is incorrect!',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('dashboard');
    }
}
