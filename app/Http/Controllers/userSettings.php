<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userSettings extends Controller
{
    public function index() {
        return view('contents.settings');
    }
}
