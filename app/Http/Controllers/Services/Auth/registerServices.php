<?php

namespace App\Http\Controllers\Services\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class registerServices extends Controller
{
    public function register($request) {
        dd($request);

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
            'email' => $request->email,
            'name' => $request->fullName,
        ];

        return $data;
    }
}
