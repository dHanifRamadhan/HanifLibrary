<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class usersController extends Controller
{
    public function index() {
        $officer = DB::table('users')->where('role', 'officer')->whereNull('deleted_at')->get();
        $librarian = DB::table('users')->where('role', 'librarian')->get();
        return view('admin.Users.index', compact('officer', 'librarian'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'username' => 'required|unique:users,username',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|min:6',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $phone = '+62 ' . $request->phone;
        $hexa = str_shuffle('0123456789ABCDEF');
        $randomColor = "#" . substr($hexa, 0, 6);
        
        DB::table('users')->insert([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'name' => $request->name,
            'phone' => $phone,
            'address' => $request->address,
            'bg_color' => $randomColor,
            'role' => 'officer',
            'email_verified_at' => now(),
            'status_verification' => 'accepted',
            'created_at' => now()
        ]);

        return redirect()->route('users.index')->with('success', (object)[
            'message' => 'berhasil membuat officer!'
        ]);
    }

    public function delete(Request $request) {
        $this->validate($request, [
            'officerId' => 'required'
        ]);
        DB::table('users')->whereIn('id', explode(',', $request->officerId))->update([
            'deleted_at' => now()
        ]);
        return redirect()->route('users.index');
    }
}
