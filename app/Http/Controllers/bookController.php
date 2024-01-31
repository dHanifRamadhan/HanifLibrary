<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class bookController extends Controller
{
    public function index() {
        $data = DB::table('books')->whereNull('deleted_at')->get();
        return response()->json([
            'code' => 200,
            'data' => $data
        ]);
    }

    public function store(Request $request) {
        DB::table("books")->insert([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'year_published'=> $request->year_published,
            'qty' => $request->qty,
            'cover_color' => $request->cover_color,
            'cover' => $request->cover,
            'created_at' => now()
        ]);
        return response()->json([
            'code' => 200,
            'message' => 'berhasil'
        ]);
    }

    public function show($id) {
        $data = DB::table('books')->where('id', $id)->whereNull('deleted_at')->first();
        return response()->json([
            'code' => 200,
            'data' => $data
        ]);
    }

    public function update(Request $request, $id) {
        DB::table('books')->where('id', $id)->whereNull('deleted_at')->update([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'year_published'=> $request->year_published,
            'qty' => $request->qty,
            'cover_color' => $request->cover_color,
            'cover' => $request->cover,
            'updated_at' => now()
        ]);
        return response()->json([
            'code' => 200,
            'message' => 'berhasil'
        ]);
    }

    public function delete($id) {
        DB::table('books')->where('id', $id)->update([
            'deleted_at' => now()
        ]);
        return response()->json([
            'code' =>200,
            'message' => 'berhasil'
        ]);
    }
}
