<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Carbon;

class transactionController extends Controller
{
    public function store() {
        $cart = DB::table('market_trolley AS a')
        ->select('a.*', 'b.picture', 'b.title', 'b.cover_color', 'b.right_color', 'b.bottom_color', 'b.id AS book_id')
        ->where('a.user_id', Auth::user()->id)
        ->rightJoin('books AS b', 'a.book_id', '=', 'b.id')
        ->whereNull('a.deleted_at')
        ->get();

        $transaction = (object)[
            'total' => 0,
            'total_qty' => 0
        ];

        $detail = [];
        $book_id = [];

        foreach ($data as $value) {
            $transaction->total += $value->unit_price * $value->unit_qty;
            $transaction->total_qty += $value->unit_qty;
        }

        $id = DB::table('transaction')->insertGetId([
            'user_id' => Auth::user()->id,
            'transaction_date' => Carbon::now()->toDate(),
            'total_qty' => $transaction->total_qty,
            'total_amount' => $transaction->total,
            'package_arrived' => Carbon::now()->addDays(7)->toDate(),
            'created_at' => now()
        ]);

        foreach ($data as $key => $value) {
            $detail[$key] = [
                'transaction_id' => $id,
                'book_id' => $value->book_id,
                'unit_price' => $value->unit_price,
                'unit_qty' => $value->unit_qty,
                'sub_total' => $value->unit_price * $value->unit_qty,
                'created_at' => now()
            ];
            $book_id = $value->book_id;
        }

        DB::table('transaction_detail')->insert($detail);

        $users = DB::table('users')->where('id', Auth::user()->id)->first();

        DB::table('users')->where('id', Auth::user()->id)->update([
            'coins' => $users->coins - $transaction->total
        ]);

        $books = DB::table('books')->update();
    }
}
