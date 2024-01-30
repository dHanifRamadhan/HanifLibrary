<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class defaultController extends Controller
{
    public function main() {
        return view('dashboard');
    }
}
