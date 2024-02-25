<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\getTokenPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class forgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot-password');
    }

    public function setToken(Request $request)
    {
        $data = DB::table('users')->whereNull('deleted_at')->where('email', $request->email)->first();

        if ($data == null) {
            return redirect()->route('forgot.password')->with('error', (object)[
                'title' => 'Not found',
                'message' => 'Email cannot be found!'
            ]);
        }

        $code = strval(rand(000, 999)) . "-" . strval(rand(000, 999));

        DB::table('password_reset_tokens')->insert([
            'user_id' => $data->id,
            'token' => $code,
            'created_at' => now(),
        ]);

        Mail::to($request->email)->send(new getTokenPassword($code));

        return redirect()->route('verified.password', $data->id)->with('success', (object)[
            'title' => 'Successful',
            'message' => 'Please check your email for the code!'
        ]);
    }

    public function check($id)
    {
        return view('auth.forgot-password.check-token-password', ['id' => $id]);
    }

    public function checkToken(Request $request, $id)
    {
        $data = DB::table('password_reset_tokens')->where('user_id', $id)->first();
        if ($data->token == $request->code) {
            return redirect()->route('change-input.password', $id)->with('success', (object)[
                'title' => 'Successful',
                'message' => 'Please change your password. Don' . "'" . 't forget it again!'
            ]);
        }
        return redirect()->route('verified.password', $id)->with('error', (object)[
            'title' => 'Failed',
            'message' => 'One time password does not match!'
        ]);
    }

    public function change($id)
    {
        if (session('success') || session('error')) {
            return view('auth.forgot-password.chenge-password', ['id' => $id]);
        }

        return redirect()->route('verified.password', $id);
    }

    public function changePassword(Request $request, $id)
    {
        DB::table('users')->whereNull('deleted_at')->where('id', $id)->update([
            'password' => Hash::make($request->password),
            'updated_at' => now()
        ]);

        DB::table('password_reset_tokens')->where('user_id')->delete();

        return redirect()->route('login')->with('success', (object)[
            'title' => 'Successful',
            'message' => 'Password successfully changed!'
        ]);
    }
}
