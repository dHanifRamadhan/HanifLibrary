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

        switch ($request->choose) {
            case 'username':
                $username = DB::table('users')->where('username', $request->inputAccount)->count();
                if ($username == 0) {
                    return back()->with([
                        'message' => 'Akun dengan username ' . $request->inputAccount . ' belum terdaftar!'
                    ]);
                }

                $validasi = DB::table('users')->select('email_verified_at', 'deleted_at')->where('username', $request->inputAccount)->first();
                if ($validasi->email_verified_at == null && $validasi->deleted_at == null) {
                    return back()->with([
                        'message' => 'Silakan check email dan verifikasi!'
                    ]);
                } else if ($validasi->deleted_at != null) {
                    return back()->with([
                        'message' => 'Akun anda dengan username ' . $request->inputAccount . ' telah dihapus oleh admin'
                    ]);
                }

                if (Auth::attempt(['username' => $request->inputAccount, 'password' => $request->password])) {
                    $request->session()->regenerate();
                    return redirect()->intended('/');
                }
                break;
            case 'email':
                $email = DB::table("users")->where("email", $request->inputAccount)->count();
                if ($email == 0) {
                    return back()->with([
                        'message' => 'Akun dengan email ' . $request->inputAccount . ' belum terdaftar!'
                    ]);
                }

                $validasi = DB::table('users')->select('email_verified_at', 'deleted_at')->where('email', $request->inputAccount)->first();
                if ($validasi->email_verified_at == null && $validasi->deleted_at == null) {
                    return back()->with([
                        'message' => 'Silakan check email dan verifikasi!'
                    ]);
                } else if ($validasi->deleted_at != null) {
                    return back()->with([
                        'message' => 'Akun anda dengan email ' . $request->inputAccount . ' telah di hapus oleh admin'
                    ]);
                }

                if (Auth::attempt(['email' => $request->inputAccount, 'password' => $request->password])) {
                    $request->session()->regenerate();
                    return redirect()->intended('/');
                }
                break;
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
