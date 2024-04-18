<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cartsController extends Controller
{
    public function index() 
    {
        return view('contents.carts');
    }
}
