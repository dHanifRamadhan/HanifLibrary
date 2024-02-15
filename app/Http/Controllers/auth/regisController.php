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
            'picture'   => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $number = "+62 " . $request->number;
        $picture = null;

        $image = $request->file('picture');
        if ($request->hasFile('picture') && Str::startsWith($image->getMimeType(), 'image/')) {
            $path = strval(mt_rand(0000, 9999)) . "-" . $image->getClientOriginalName();
            $picture = $request->picture->storeAs('image/users', $path);
        }
        
        $id = DB::table('users')->insertGetId([
            'username'  =>  $request->username,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role'      => 'librarian',
            'full_name' => $request->fullName,
            'phone'     => $number,
            'address'   => $request->address,
            'profile'   => $picture,
            'created_at' => now(),
        ]);

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
        DB::table('users')->where('id', $id)->update([
            'email_verified_at' => now(),
        ]);
        return 'Akun anda berhasil terverifikasi';
    }
}
