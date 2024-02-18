<?php

namespace App\Http\Controllers;

use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class bookController extends Controller
{
    public function index()
    {
        $check = DB::table('categories')->whereNull('deleted_at')->count();

        $data = DB::table('full_category AS a')
        ->join('books AS b', 'a.book_id', '=', 'b.id')
        ->join('categories AS c', 'a.category_id', '=', 'c.id')
        ->select('b.*', DB::raw('GROUP_CONCAT(c.name) AS category'))
        ->groupBy('a.book_id')
        ->paginate(5);

        return view('form.book.index', ['check' => $check, 'data' => $data]);
    }

    public function create()
    {
        $data = DB::table('categories')->whereNull('deleted_at')->orderBy('name', 'ASC')->get();
        return view('form.book.create', ['categories' => $data]);
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
            'cover' => $request->cover,
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

        DB::table('full_category')->insert($data);

        return redirect()->route('book')->with([
            'message' => 'Successfully create data for books !'
        ])->withErrors([
            'message' =>  'Failed to create data for the book'
        ]);
    }
}
