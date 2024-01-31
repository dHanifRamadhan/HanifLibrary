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
        $this->validate($request, [
            'inputAccount' => 'required',
            'password' => 'required'
        ]);

        $account = 0;
        $message1 = null;
        $message2 = 'Silakan check email dan verifikasi!';
        $message3 = null;
        $validasi = null;
        $login = null;

        switch ($request->choose) {
            case 'username':
                $account = DB::table('users')->where('username', $request->inputAccount)->count();
                $validasi = DB::table('users')->select('email_verified_at', 'deleted_at')->where('username', $request->inputAccount)->first();
                $login = ['username' => $request->inputAccount, 'password' => $request->password];

                $message1 = 'Akun dengan username ' . $request->inputAccount . ' belum terdaftar!';
                $message3 = 'Akun anda dengan username ' . $request->inputAccount . ' telah dihapus oleh admin';
                break;
            case 'email':
                $account = DB::table("users")->where("email", $request->inputAccount)->count();
                $validasi = DB::table('users')->select('email_verified_at', 'deleted_at')->where('email', $request->inputAccount)->first();
                $login = ['email' => $request->inputAccount, 'password' => $request->password];
                
                $message1 = 'Akun dengan email ' . $request->inputAccount . ' belum terdaftar!';
                $message3  = 'Akun anda dengan email ' . $request->inputAccount . ' telah di hapus oleh admin';
                break;
            }

        if ($account == 0) {
            return back()->with([
                'message' => $message1
            ]);
        }
        
        if ($validasi->email_verified_at == null && $validasi->deleted_at == null) {
            return back()->with([
                'message' => $message2
            ]);
        } else if ($validasi->deleted_at != null) {
            return back()->with([
                'message' => $message3
            ]);
        }
        
        if (Auth::attempt($login)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with([
            'message' => 'Password atau email salah!'
        ]);
    }

    public function authlogin()
    {
        return view('auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('main');
    }
}
