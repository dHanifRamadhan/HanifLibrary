<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bookController extends Controller
{
    public function index() {
        return view('form.book.index');
    }

    public function create() {
        return view('form.book.create');
    }
}
