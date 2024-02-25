<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
    //
    public function login()
    {
        return view('auth.login');
    }

    public function authLogin(Request $request)
    {
        $this->validate($request, [
            'inputAccount' => 'required',
            'password' => 'required'
        ]);

        $account = null;
        $validasi = null;
        $login = null;

        $message1 = null;
        $message2 = null;


        switch ($request->choose) {
            case 'username':
                $account = DB::table('users')->where('username', $request->inputAccount)->count();
                $login = ['username' => $request->inputAccount, 'password' => $request->password];
                $validasi = DB::table('users')->select('email_verified_at', 'deleted_at')->where('username', $request->inputAccount)->first();

                $message1 = 'Account with username ' . $request->inputAccount . ' not yet registered!';
                $message2 = 'Account with username ' . $request->inputAccount . ' has been deleted by admin';
                break;
            case 'email':
                $account = DB::table("users")->where("email", $request->inputAccount)->count();
                $login = ['email' => $request->inputAccount, 'password' => $request->password];
                $validasi = DB::table('users')->select('email_verified_at', 'deleted_at')->where('email', $request->inputAccount)->first();

                $message1 = 'Account with email ' . $request->inputAccount . ' not yet registered!';
                $message2 = 'Account with email ' . $request->inputAccount . ' has been deleted by admin';
                break;
        }

        if ($account == 0) {
            return redirect()->route('login')->with('error', (object)[
                'title' => 'Login failed',
                'message' => $message1
            ]);
        }

        if ($validasi->email_verified_at == null && $validasi->deleted_at == null) {
            return redirect()->route('login')->with('error', (object)[
                'title' => 'Login failed',
                'message' => 'Please check your email and verify!'
            ]);
        } else if ($validasi->deleted_at != null) {
            return redirect()->route('login')->with('error', (object)[
                'title' => 'Login failed',
                'message' => $message2
            ]);
        }

        if (Auth::attempt($login)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', (object)[
                'title' => 'Successful login',
                'message' => 'Welcome to the hanif library website!'
            ]);
        }

        return redirect()->route('login')->with('error' , (object)[
            'title' => 'Login failed',
            'message' => 'Your password or email is incorrect!'
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
