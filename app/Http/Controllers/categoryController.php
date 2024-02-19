<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categoryController extends Controller
{
    public function index() {
        $data = DB::table('categories')->whereNull('deleted_at')->orderBy('name', 'ASC')->paginate(10);
        return view('form.category.index', ['data' => $data]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'category' => 'required|unique:categories,name'
        ]);

        DB::table('categories')->insert([
            'name' => $request->category,
            'created_at' => now()
        ]);

        return redirect()->route('category')->with([
            'message' => 'Category berhasil di buat!'
        ]);
    }

    public function show($id) {
        $data = DB::table('categories')->where('id', $id)->whereNull('deleted_at')->first();
        return view('form.category.modalUpdate', ['data' => $data]);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'category' => 'required|unique:categories,name'
        ]);

        DB::table('categories')->where('id', $id)->update([
            'name' => $request->category
        ]);

        return redirect()->route('category')->with([
            'message' => 'Data berhasil di Update!'
        ]);
    }

    public function delete($id) {
        $data =  DB::table('categories')->where('id', $id)->first();
        if ($data->deleted_at == null) {
            DB::table('categories')->where('id', $id)->update([
                'deleted_at' => now()
            ]);
            return redirect()->route('category')->with([
                'message' => 'Delete Success'
            ]);
        } else {
            DB::table('categories')->where('id', $id)->delete();
            return redirect()->route('category.trash')->with([
                'message' => 'Delete Success'
            ]);
        }
    }

    public function trash() {
        $data = DB::table('categories')->whereNotNull('deleted_at')->paginate(10);
        return view('form.category.index', ['data' => $data]);
    }

    public function recive($id) {  
        DB::table('categories')->where('id', $id)->whereNotNull('deleted_at')->update([
            'deleted_at' => null
        ]);
        return redirect()->route('category.trash')->with([
            'message' => 'Recive Success'
        ])->withErrors([
            'error' => 'Error'
        ]);
    }

    public function deleteAll() {
        DB::table('categories')->whereNotNull('deleted_at')->delete();
        return redirect()->route('category');
    }
}
