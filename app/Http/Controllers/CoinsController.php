<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoinsController extends Controller
{
    public function index()
    {
        // DB::table('coins')->whereNull('deleted_at')->get();
        return view('admin.coins.index');
    }
}
