<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function index() {
        $data = DB::table('categories')->whereNull('deleted_at')->orderBy('name', 'ASC')->paginate(10);
        return view('admin.category.index', ['data' => $data]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'category' => 'required|unique:categories,name'
        ]);

        DB::table('categories')->insert([
            'name' => $request->category,
            'created_at' => now()
        ]);

        return redirect()->route('category.index')->with('success', (object)[
            'title' => 'Successful',
            'message' => 'Category created successfully!'
        ]);
    }

    public function show($id) {
        $data = DB::table('categories')->where('id', $id)->whereNull('deleted_at')->first();
        if ($data == null) {
            return redirect()->route('category.index')->with('error', (object)[
                'title' => 'Not found',
                'message' => 'Categoty not found!'
            ]);
        }
        return view('admin.category.modalUpdate', ['data' => $data]);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'category' => 'required|unique:categories,name'
        ]);

        DB::table('categories')->where('id', $id)->update([
            'name' => $request->category
        ]);

        return redirect()->route('category.index')->with('success', (object)[
            'title' => 'Successful',
            'message' => 'Category updated successfully!'
        ]);
    }

    public function delete($id) {
        $data =  DB::table('categories')->where('id', $id)->first();
        if ($data->deleted_at == null) {
            DB::table('categories')->where('id', $id)->update([
                'deleted_at' => now()
            ]);
            return redirect()->route('category.index')->with('success', (object)[
                'title' => 'Successful',
                'message' => 'Categories deleted successfully!'
            ]);
        } else {
            DB::table('categories')->where('id', $id)->delete();
            return redirect()->route('category.trash')->with('success', (object)[
                'title' => 'Successful',
                'message' => 'Categories deleted successfully!'
            ]);
        }
    }

    public function trash() {
        $data = DB::table('categories')->whereNotNull('deleted_at')->paginate(10);
        return view('admin.category.index', ['data' => $data]);
    }

    public function recive($id) {  
        DB::table('categories')->where('id', $id)->whereNotNull('deleted_at')->update([
            'deleted_at' => null
        ]);

        return redirect()->route('category.trash')->with('success', (object)[
            'title' => 'Successful',
            'message' => 'Successfully restored category!'
        ]);
    }

    public function deleteAll() {
        DB::table('categories')->whereNotNull('deleted_at')->delete();
        return redirect()->route('category.index')->with('success', (object)[
            'title' => 'Successful',
            'message' => 'Successfully deleted all category trash!'
        ]);
    }
}
