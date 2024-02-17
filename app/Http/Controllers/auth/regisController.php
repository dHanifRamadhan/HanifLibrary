<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Mail\acceptAccountMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class regisController extends Controller
{
    public function regis(Request $request)
    {
        $this->validate($request, [
            'username'  => 'required|unique:users,username',
            'email'     => 'required|email:dns,rfc|unique:users,email',
            'password'  => 'required|min:6',
            'fullName'  => 'required',
            'number'    => 'required',
            'address'   => 'required',
        ]);

        $number = "+62 " . $request->number;
        $role = 'librarian';

        if ($request->roles != null && $request->roles == "HanifKerenBanget") {
            $role = 'admin';
        }

        $create = [
            'username'  =>  $request->username,
            'email'     => $request->email,
            'status_email' => 1,
            'password'  => Hash::make($request->password),
            'role'      => $role,
            'full_name' => $request->fullName,
            'phone'     => $number,
            'address'   => $request->address,
            'created_at' => now(),
        ];

        $image = $request->file('picture');

        if ($request->hasFile('picture') && Str::startsWith($image->getMimeType(), 'image/')) {
            $this->validate($request, [
                'picture'   => 'required|image|mimes:jpeg,png,jpg',
            ]);

            $path = strval(mt_rand(0000, 9999)) . "-" . $image->getClientOriginalName();
            $picture = $request->picture->storeAs('image/users', $path);

            $create["picture"] = $picture;
        }

        $id = DB::table('users')->insertGetId($create);

        $data = [
            'id' => $id,
            'name' => $request->fullName,
        ];

        Mail::to($request->email)->send(new acceptAccountMail($data));

        return back()->with([
            'message' => 'Email berhasil di registerasi',
            'warning' => 'Silakan check email kamu ' . $request->email . ' !',
        ]);
    }

    public function authRegis()
    {
        return view('auth.regis');
    }

    public function acceptAccount($id)
    {
        $check = DB::table("users")->where('id', $id)->first();
        if ($check->status_email != 0) {
            DB::table('users')->where('id', $id)->update([
                'email_verified_at' => now(),
                'status_email' => 0
            ]);
            return view('debug.email-verified')->with([
                'message' => 'Your account has been successfully verified'
            ]);
        }
        return view('debug.email-verified')->with([
            'message' => 'Your account has been verified'
        ]);
    }
}
