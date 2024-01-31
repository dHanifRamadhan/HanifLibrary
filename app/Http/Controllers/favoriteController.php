<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class favoriteController extends Controller
{
    public function index(Request $request) {
        $data = DB::table('favorite')->whereNull('deleted_at')->get();
        return response()->json([
            'code' => 200,
            'data' => $data
        ]);
    }

    public function store(Request $request) {
        DB::table('favorite')->insert([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'created_at' => now()
        ]);
        return response()->json([
            'code' => 200,
            'message' => 'berhasil'
        ]);
    } 

    public function delete($id) {
        DB::table('favorite')->where('id', $id)->delete();
        return response()->json([
            'code' => 200,
            'message' => 'berhasil'
        ]);
    }
}
