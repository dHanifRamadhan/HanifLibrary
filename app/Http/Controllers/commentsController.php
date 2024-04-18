<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class commentsController extends Controller
{
    public function store(Request $request, $id) {
        DB::table("comments")->insert([
            'user_id' => Auth::user()->id,
            'book_id' => $id,
            'comment' => $request->comment,
            'rating' => $request->rating,
            'date' => Carbon::now()->toDate(),
            'created_at' => now()
        ]);

        return redirect()->route('detail', $id);
    }
}
