<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class OfficerController extends Controller
{
    public function index()
    {
        $data = DB::table('users')
            ->where('role', 'officer');

        if (request()->has('search')) {
            $data = $data->where('username', 'LIKE', '%' . request()->get('search') . '%');
        }

        return view('admin.officer.index', [
            'data' => $data->paginate(10)
        ]);
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

        $number = "+62 " . $request->number;

        if (Auth::check() && Auth::user()->role != 'admin') {
            return abort('403', 'Dilarang Curang');
        }

        $count = DB::table('users')->where('role', 'officer')->count();
        $name = date('Ymd') . ($count) . '-' . str_replace(' ', '', $request->image->getClientOriginalName());
        $path = $request->image->storeAs('image/users', $name);

        DB::table('users')->insert([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->username . 'HanifLibrary'),
            'email_verified_at' => now(),
            'role' => 'officer',
            'full_name' => $request->firstName . " " . $request->lastName,
            'phone' => $number,
            'address' => $request->address,
            'profile' => $path,
            'created_at' => now()
        ]);

        return redirect()->route('officer.index')->with('success', (object)[
            'title' => 'Successful',
            'message' => 'Success create data officer with full name ' . $request->firstName . "" . $request->lastName
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

        return redirect()->route('officer.index')->with('success', (object)[
            'title' => 'Successful',
            'message' => 'Successfully updated the officer password!'
        ]);
    }

    public function ban($id)
    {
        DB::table('users')->where('role', 'officer')->where('id', $id)->update([
            'deleted_at' => now()
        ]);

        return redirect()->route('officer.index')->with('success', (object)[
            'title' => 'Successful',
            'message' => 'Successfully ban officers with id ' . $id . ' !'
        ]);
    }

    public function unban($id)
    {
        DB::table('users')->where('role', 'officer')->where('id', $id)->update([
            'deleted_at' => null
        ]);

        return redirect()->route('officer.index')->with('success', (object)[
            'title' => 'Successful',
            'message' => 'Successfully unban officers with id ' . $id . ' !'
        ]);
    }

    public function delete($id)
    {
        $data = DB::table('users')->where('id', $id)->first();

        if ($data->profile) {
            Storage::disk('public')->delete($data->profile);
        }

        DB::table('users')->where('id', $id)->delete();

        return redirect()->route('officer.index')->with('success', (object)[
            'title' => 'Successful',
            'message' => 'Successfully deleted users with username '.$data->username.' !'
        ]);
    }
}
