<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Services\Auth\registerServices;
use Illuminate\Support\Facades\Mail;
use App\Mail\acceptEmailUsers;

class registerController extends Controller
{
    public function register() {
        return view('Auth.regis');
    }

    public function registerPost(Request $request) {
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
                'message' => 'enter your mobile number correctly!'
            ]);
        }

        $services = new registerServices();
        $register = $services->register($request);

        
        Mail::to($register->email)->send(new acceptEmailUsers($register));

        return back()->with('success', (object)[
            'title' => 'Email successfully registered',
            'message' => 'Please check your email ' . $request->email . ' !',
        ]);
    }    
}
