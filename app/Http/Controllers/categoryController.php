<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categoryController extends Controller
{
    public function index() {
        $category = DB::table('categories')->whereNull('deleted_at')->get();
        return response()->json([
            'code' => 200,
            'data' => $category
        ]);
    }

    public function store(Request $request) {
        DB::table("categories")->insert([
            'name' => $request->name,
            'created_at' => now()
        ]);
        return response()->json([
            'code' =>200,
            'message' => 'berhasil'
        ]);
    }

    public function show($id) {
        $data = DB::table('categories')->where('id', $id)->whereNull('deleted_at')->first();
        return response()->json([
            'code' => 200,
            'data' => $data
        ]);
    }

    public function update(Request $request, $id) {
        DB::table('categories')->where('id', $id)->whereNull('deleted_at')->update([
            'name' => $request->name,
            'updated_at' => now()
        ]);

        return response()->json([
            'code' => 200,
            'message' => 'berhasil'
        ]);
    }

    public function delete($id) {
        DB::table('categories')->where('id', $id)->whereNull('deleted_at')->update([
            'deleted_at' => now()
        ]);
        return response()->json([
            'code' => 200,
            'message' => 'berhasil'
        ]);
    }
}
