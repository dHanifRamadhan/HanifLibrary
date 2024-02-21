<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class officerController extends Controller
{
    public function index(Request $request)
    {
        $status = "none";
        $data = DB::table('users')
            ->where('role', 'officer')
            ->paginate(10);

        if ($request->ban != "ban") {
            $data = DB::table('users')
                ->where('role', 'officer')
                ->whereNotNull('deleted_at')
                ->paginate(10);
        } else {
            $data = DB::table('users')
                ->where('role', 'officer')
                ->whereNull('deleted_at')
                ->paginate(10);
        }

        return view('form.officer.index', ['data' => $data, 'status' => $status]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users,username',
            'email' => 'required|email:dns,rfc|unique:users,email',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'number' => 'required',
            'address' => 'required',
            'image' => 'required|image|mimes:png,jpeg,jpg'
        ]);

        if (Auth::check() && Auth::user()->role != 'admin') {
            return abort('403', 'Dilarang Curang');
        }

        $count = DB::table('users')->where('role', 'officer')->count();
        $name = date('Ymd') . ($count) . '-' . str_replace(' ', '', $request->image->getClientOriginalName());
        $path = $request->image->storeAs('image', $name);

        DB::table('users')->insert([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->username . 'HanifLibrary'),
            'email_verified_at' => now(),
            'role' => 'officer',
            'full_name' => $request->firstName . " " . $request->lastName,
            'phone' => $request->number,
            'address' => $request->address,
            'profile' => $path,
            'created_at' => now()
        ]);

        return redirect()->route('officer')->with([
            'success' => 'Success create data officer with full name ' . $request->firstName . "" . $request->lastName
        ])->withErrors([
            'error' => 'An error occurred while creating the data!'
        ]);
    }

    public function reset(Request $request)
    {
        $this->validate($request, [
            'userId' => 'required',
            'password' => 'required'
        ]);

        DB::table('users')->where('id', $request->userId)->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with([
            'success' => 'Success reset password officer'
        ])->withErrors([
            'error' => 'password reset canceled'
        ]);
    }

    public function ban($id)
    {
        DB::table('users')->where('role', 'officer')->where('id', $id)->update([
            'deleted_at' => now()
        ]);
        return back()->with([
            'success' => 'Success BAN officer with id ' . $id
        ]);
    }

    public function unban($id)
    {
        DB::table('users')->where('role', 'officer')->where('id', $id)->update([
            'deleted_at' => null
        ]);
        return back()->with([
            'success' => 'Success UNBAN officer with id ' . $id
        ]);
    }
}
