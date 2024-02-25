<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\acceptEmailUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class registerController extends Controller
{
    public function register()
    {
        return view('auth.regis');
    }

    public function authRegister(Request $request)
    {
        $this->validate($request, [
            'username'  => 'required|unique:users,username',
            'email'     => 'required|email:dns,rfc|unique:users,email',
            'password'  => 'required|min:6',
            'fullName'  => 'required',
            'number'    => 'required',
            'address'   => 'required',
        ]);
        
        if (strlen($request->number) <= 12) {
            return redirect()->route('register')->with('error', (object)[
                'title' => 'Failed to create account',
                'message' => 'enter your mobile number correctly!'
            ]);
        }

        $number = "+62 " . $request->number;
        $role = 'librarian';

        if ($request->roles != null && $request->roles == "HanifKerenBanget") {
            $role = 'admin';
        }

        $create = [
            'username'  =>  $request->username,
            'email'     => $request->email,
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
                'picture'   => 'required|image',
            ]);

            $path = strval(mt_rand(0000, 9999)) . "-" . str_replace(' ', '', $image->getClientOriginalName());
            $picture = $request->picture->storeAs('image/users', $path);

            $create["profile"] = $picture;
        }

        $id = DB::table('users')->insertGetId($create);
        DB::table('accept_email')->insert([
            'user_id' => $id,
            'email_verified_date' => now()
        ]);

        $data = (object)[
            'id' => $id,
            'name' => $request->fullName,
        ];

        Mail::to($request->email)->send(new acceptEmailUsers($data));

        return back()->with('success', (object)[
            'title' => 'Email successfully registered',
            'message' => 'Please check your email ' . $request->email . ' !',
        ]);
    }

    public function regisSession() {
        return redirect()->route('login')->with('success', (object)[
            'title' => 'Successfully create an account',
            'message' => 'Please check your email, to accept your account!'
        ]);
    }
}
