<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class officerController extends Controller
{
    public function index() {
        $officer = DB::table('users')->where('role', 'officer')->whereNull('deleted_at')->get();
        $data = response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => $officer
        ]);

        return view('form.officer.index', ['data' => $data]);
    }

}
