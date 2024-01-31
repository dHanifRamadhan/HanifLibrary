<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class fullCategoryController extends Controller
{
    public function index() {
        $data = DB::table('full_category')->whereNull('deleted_at')->get();
        return response()->json([
            'code' => 200,
            'data' => $data
        ]);
    }

    public function store(Request $request) {
        DB::table('full_category')->insert([
            'book_id' => $request->book_id,
            'category_id' => $request->category_id,
            'created_at' => now()
        ]);

        return response()->json([
            'code' => 200,
            'message' => 'berhasil'
        ]);
    }

    public function show($id) {
        $data = DB::table('full_category')->where('id', $id)->whereNull('deleted_at')->first();
        return response()->json([
            'code' => 200,
            'data' => $data
        ]);
    }

    public function update(Request $request, $id) {
        DB::table('full_category')->where('id', $id)->whereNull('deleted_at')->update([
            'book_id' => $request->book_id,
            'category_id' => $request->category_id,
            'updated_at' => now()
        ]);

        return response()->json([
            'code' => 200,
            'message' => 'berhasil'
        ]);
    }

    public function delete($id) {
        DB::table('full_category')->where('id', $id)->whereNull('deleted_at')->update([
            'deleted_at' => now()
        ]);
        return response()->json([
            'code' => 200,
            'mesage' => 'berhasil'
        ]);
    }
}
