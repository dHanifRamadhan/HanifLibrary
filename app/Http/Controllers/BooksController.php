<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    public function index()
    {
        $mode = "default";
        $sub = DB::table('book_and_category AS b')
            ->rightJoin('categories AS c', 'b.category_id', '=', 'c.id')
            ->select('b.book_id', DB::raw('GROUP_CONCAT(c.name) AS category_name'))
            ->groupBy('b.book_id');

        $data = DB::table('books AS a')
            ->leftJoinSub($sub, 'd', function ($query) {
                $query->on('d.book_id', '=', 'a.id');
            })
            ->select('a.*', 'd.category_name')
            ->whereNull('deleted_at');

        if (request()->has('search')) {
            $data = $data->where('title', 'LIKE', '%' . request()->get('search') . '%');
        }

        if ($mode == 'default') {
            $data = $data->paginate(3);
        } else {
            $data = $data->paginate(10);
        }

        return view('admin.book.index', ['data' => $data, 'mode' => $mode]);
    }

    public function create()
    {
        $data = DB::table('categories')->whereNull('deleted_at')->orderBy('name', 'ASC')->get();
        return view('admin.book.create', ['categories' => $data]);
    }

    public function show($id)
    {
        $data = DB::table('book_and_category AS a')
            ->join('books AS b', 'a.book_id', '=', 'b.id')
            ->join('categories AS c', 'a.category_id', '=', 'c.id')
            ->select('b.*', DB::raw('GROUP_CONCAT(a.category_id) AS category'))
            ->where('a.book_id', $id)
            ->groupBy('a.book_id')
            ->first();

        $dataCategory = DB::table('categories')->whereNull('deleted_at')->get();
        $category = [];

        foreach ($dataCategory as $key => $value) {
            $category[$value->id] = (object)[
                'id' => $value->id,
                'name' => $value->name,
                'selected' => 'no'
            ];
        }

        foreach (explode(',', $data->category) as $key => $value) {
            $category[$value]->selected = 'yes';
        }

        return view('admin.book.create', ['data' => $data, 'categories' => $category]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:books,title',
            'author' => 'required',
            'publisher' => 'required',
            'year_published' => 'required|date',
            'category' => 'required',
            'qty' => 'required',
            'cover' => 'required',
            'cover_right_color' => 'required',
            'cover_bottom_color' => 'required',
            'picture' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        $path = strval(mt_rand(00000, 99999) . "-" . $request->picture->getClientOriginalName());
        $picture = $request->picture->storeAs('image/cover-books', $path);

        $id = DB::table('books')->insertGetId([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'year_published' => $request->year_published,
            'qty' => $request->qty,
            'cover_color' => $request->cover,
            'cover_right_color' => $request->cover_right_color,
            'cover_bottom_color' => $request->cover_bottom_color,
            'picture' => $picture,
            'created_at' => now()
        ]);

        $data = [];
        foreach ($request->category as $key => $value) {
            $data[$key] = [
                "category_id" => $value,
                "book_id" => $id,
                "created_at" => now()
            ];
        }

        DB::table('book_and_category')->insert($data);

        return redirect()->route('book.index')->with('success', (object)[
            'title' => 'Successful',
            'message' => 'Book added successfully!'
        ]);
    }

    public function updateStock($id, Request $request)
    {
        $this->validate($request, [
            'qty' => 'required|numeric'
        ]);

        DB::table('books')->where('id', $id)->update([
            'qty' => $request->qty
        ]);

        return redirect()->route('book.index')->with('success', (object)[
            'title' => 'Successful',
            'message' => 'Successfully update stock'
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'year_published' => 'required',
            'publisher' => 'required',
            'qty' => 'required',
            'category' => 'required'
        ]);

        $category = [];
        foreach ($request->category as $key => $value) {
            $category[] = [
                'book_id' => $id,
                'category_id' => $value,
                'created_at' => now()
            ];
        }

        DB::table('books')->whereNull('deleted_at')->where('id', $id)->update([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'year_published' => $request->year_published,
            'qty' => $request->qty,
            'updated_at' => now()
        ]);

        DB::table('book_and_category')->where('book_id', $id)->delete();
        DB::table('book_and_category')->insert($category);

        return redirect()->route('book.index')->with('success', (object)[
            'title' => 'Successful',
            'message' => 'Successfully updated books ' . $request->title . ' !'
        ]);
    }

    public function delete($id) {
        DB::table('books')->where('id', $id)->update([
            'deleted_at' => now()
        ]);

        return redirect()->route('book.index')->with('success', (object)[
            'title' => 'Successful',
            'message' => 'Successfully deleted book!'
        ]);
    }
}
