<?php

namespace App\Http\Controllers\Services\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class registerServices extends Controller
{
    public function register($request)
    {
        $hexa = str_shuffle('0123456789ABCDEF');
        $randomColor = "#" . substr($hexa, 0, 6);

        $number = "+62 " . $request->number;
        $role = 'librarian';

        if ($request->roles != null && $request->roles == "HanifLibrary281004Ramadhan") {
            $role = 'admin';
        }

        $create = [
            'username'  =>  $request->username,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role'      => $role,
            'name' => $request->fullName,
            'phone'     => $number,
            'address'   => $request->address,
            'email_expired' => Carbon::now()->addDay(1),
            'created_at' => now(),
        ];

        $image = $request->file('picture');

        if ($image != true || $request->picture == null) {
            $create['bg_color'] = $randomColor;
        }

        if ($request->hasFile('picture') && Str::startsWith($image->getMimeType(), 'image/')) {
            $this->validate($request, [
                'picture'   => 'required|image',
            ]);

            $path = strval(mt_rand(0000, 9999)) . "-" . str_replace(' ', '', $image->getClientOriginalName());
            $picture = $request->picture->storeAs('image/users', $path);

            $create["profile"] = $picture;
        }

        $id = DB::table('users')->insertGetId($create);

        $data = (object)[
            'id' => $id,
            'email' => $request->email,
        ];

        return $data;
    }
}
