<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $data = DB::table('categories')->get();
        return response()->json([
            'code' => 200,
            'message' => 'Successful',
            'data' => $data
        ], 200);
    }
}
