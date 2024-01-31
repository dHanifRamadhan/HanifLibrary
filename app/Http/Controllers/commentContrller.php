<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class commentContrller extends Controller
{
    public function index() {
        $data = DB::table('comments')->whereNull('deleted_at')->get();
        return response()->json([
            'code' => 200,
            'data' => $data
        ]);
    }

    public function store(Request $request) {
        DB::table('comments')->insert([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'comment' => $request->comment,
            'rating' => $request->rating,
            'like'=> $request->like,
            'dislike' => $request->dislike,
            'created_at' => now()
        ]);
        return response()->json([
            'code' => 200,
            'message' => 'berhasil'
        ]);
    }

    public function show($id) {
        $data = DB::table('comments')->where('id', $id)->whereNull('deleted_at')->get();
        return response()->json([
            'code' => 200,
            'data' => $data
        ]);
    }

    public function update(Request $request, $id) {
        DB::table('comments')->where('id', $id)->whereNull('deleted_at')->update([
            'book_id' => $request->book_id,
            'comment' => $request->comment,
            'rating' => $request->rating,
            'like'=> $request->like,
            'dislike' => $request->dislike,
            'updated_at' => now()
        ]);
        return response()->json([
            'code' => 200,
            'message' => 'berhasil'
        ]);
    }

    public function delete($id) {
        DB::table('comments')->where('id')->whereNull('deleted_at')->update([
            'deleted_at' => now()
        ]);
        return response()->json([
            'code' => 200,
            'message' => 'berhasil'
        ]);
    }
}
