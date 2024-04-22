<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class cartsController extends Controller
{
    public function index()
    {
        $data = DB::table('market_trolley AS a')
                    ->select('a.*', 'b.picture', 'b.title', 'b.cover_color', 'b.right_color', 'b.bottom_color')
                    ->where('a.user_id', Auth::user()->id)
                    ->rightJoin('books AS b', 'a.book_id', '=', 'b.id')
                    ->whereNull('a.deleted_at')
                    ->get();

        $transaction = (object)[
            'total' => 0,
            'total_qty' => 0
        ];

        foreach ($data as $value) {
            $transaction->total += $value->unit_price * $value->unit_qty;
            $transaction->total_qty += $value->unit_qty;
        }

        return view('contents.carts', compact('data', 'transaction'));
    }

    public function store(Request $request, $id) {
        $books = DB::table('books')->where('id', $id)->whereNull('deleted_at')->first();

        DB::table("market_trolley")->insert([
            'user_id' => Auth::user()->id,
            'book_id' => $books->id,
            'unit_qty' => '1',
            'unit_price' => $books->price,
            'created_at' => now()
        ]);

        return back();
    }

    public function delete($id)
    {
        DB::table("market_trolley")
                ->where('id', $id)
                ->where('user_id', Auth::user()->id)
                ->delete();

        return redirect()->route('carts.index');
    }

    public function transaction() {
        $data = DB::table('market_trolley AS a')
        ->select('a.*', 'b.picture', 'b.title', 'b.cover_color', 'b.right_color', 'b.bottom_color', 'b.id AS book_id')
        ->where('a.user_id', Auth::user()->id)
        ->rightJoin('books AS b', 'a.book_id', '=', 'b.id')
        ->whereNull('a.deleted_at')
        ->get();

        foreach ($data as $key => $value) {
            $book = DB::table('books')->where('id', $value->book_id)->whereNull('deleted_at')->first();
            if ($value->unit_qty >= $book->qty) {
                return back();
            }
        }

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

        if (Auth::user()->coins <= $transaction->total) {
            return back();
        }

        $id = DB::table('transactions')->insertGetId([
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
            $book = DB::table('books')->where('id', $value->book_id)->whereNull('deleted_at')->first();
            DB::table('books')->where('id', $value->book_id)->update([
                'qty' => $book->qty - $value->unit_qty
            ]);
        }

        DB::table('transaction_details')->insert($detail);

        $users = DB::table('users')->where('id', Auth::user()->id)->first();

        DB::table('users')->where('id', Auth::user()->id)->update([
            'coins' => $users->coins - $transaction->total
        ]);

        DB::table('market_trolley')->where('user_id', Auth::user()->id)->delete();

        return redirect()->route('dashboard');
    }
}
