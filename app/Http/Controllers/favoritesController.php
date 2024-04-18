<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class favoritesController extends Controller
{
    public function index() {
        $data = DB::table('favorites AS a')
        ->select('a.*', 'b.title', 'b.picture', 'b.synopsis', 'b.right_color', 'b.cover_color', 'b.bottom_color')
        ->join('books AS b', 'a.book_id', '=', 'b.id')
        ->where('a.user_id', Auth::user()->id)
        ->get();

        return view('contents.favorite', compact('data'));
    }

    public function store(Request $request, $id)
    {
        $check = DB::table('favorites')
            ->where('user_id', Auth::user()->id)
            ->where('book_id', $id)
            ->count();

        if ($check == 0)
        {
            DB::table('favorites')->insert([
                'user_id' => Auth::user()->id,
                'book_id' => $id,
                'created_at' => now()
            ]);
        } else {
            DB::table('favorites')
            ->where('user_id', Auth::user()->id)
            ->where('book_id', $id)
            ->delete();
        }

        return redirect()->route('dashboard');
    }
}
