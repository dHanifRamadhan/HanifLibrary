<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class contentController extends Controller
{
    public function recommended()
    {
        $subQuery = DB::table('comments')
            ->select('book_id', DB::raw('GROUP_CONCAT(rating/2) AS rating'))
            ->groupBy('book_id')
            ->get();

        $rumus = [];
        $data = [];
        $rating = [];

        foreach ($subQuery as $key => $value) {
            $data[$key] = (object)[
                'rating' => []
            ];

            $rumus[$key] = (object)[
                'rating' => (object)[
                    'a' => 0,
                    'b' => 0,
                    'c' => 0,
                    'd' => 0,
                    'e' => 0,
                ]
            ];

            $rating[$key] = (object)[
                'book_id' => $value->book_id,
                'rating' => 0
            ];

            foreach (explode(',', $value->rating) as $k => $v) {
                $data[$key]->rating[$k] = number_format($v, 1, '.', '');

                switch ($v) {
                    case 5:
                        $rumus[$key]->rating->a++;
                        break;
                    case 4:
                        $rumus[$key]->rating->b++;
                        break;
                    case 3:
                        $rumus[$key]->rating->c++;
                        break;
                    case 2:
                        $rumus[$key]->rating->d++;
                        break;
                    case 1:
                        $rumus[$key]->rating->e++;
                        break;
                }
            }

            $r = (
                5 * $rumus[$key]->rating->a +
                4 * $rumus[$key]->rating->b +
                3 * $rumus[$key]->rating->c +
                2 * $rumus[$key]->rating->d +
                $rumus[$key]->rating->e
            ) / (
                $rumus[$key]->rating->a +
                $rumus[$key]->rating->b +
                $rumus[$key]->rating->c +
                $rumus[$key]->rating->d +
                $rumus[$key]->rating->e
            );

            $rating[$key]->rating = number_format($r, 1, '.', '');
        }

        $sub = DB::table('book_and_category AS b')
            ->rightJoin('categories AS c', 'b.category_id', '=', 'c.id')
            ->select('b.book_id', DB::raw('GROUP_CONCAT(c.name) AS category_name'))
            ->groupBy('b.book_id');

        $recommended = DB::table('books AS a')
            ->select('a.*', 'd.category_name')
            ->leftJoinSub($sub, 'd', function ($query) {
                $query->on('d.book_id', '=', 'a.id');
            })
            ->whereNull('a.deleted_at')
            ->where('a.qty', '>', '1')
            ->get();


        $maxArrayRating = count($rating);
        foreach ($recommended as $key => $value) {
            if ($key < $maxArrayRating) {
                if ($value->id == $rating[$key]->book_id) {
                    $value->rating = $rating[$key]->rating * 2;
                    $value->rating_true = $rating[$key]->rating;
                } else {
                    $value->rating = 0;
                    $value->rating_true = 0;
                }
            } else {
                $value->rating = 0;
                $value->rating_true = 0;
            }
        }

        return $recommended;
    }

    public function dashboard()
    {
        // Rating
        $recommended = $this->recommended()->filter(function ($items) {
            return $items->rating >= 8;
        });
        // Rating

        $categories = DB::table('categories')->whereNull('deleted_at')->get();

        $subQuery = DB::table('book_and_category AS b')
            ->leftJoin('categories AS c', 'b.category_id', '=', 'c.id')
            ->select('b.book_id', DB::raw('GROUP_CONCAT(c.name) AS category_name'))
            ->groupBy('b.book_id');

        $books = DB::table('books AS a')
            ->rightJoinSub($subQuery, 'd', function ($query) {
                $query->on('d.book_id', '=', 'a.id');
            })
            ->select('a.*', 'd.category_name')
            ->whereNull('deleted_at');

        $search = request()->category;

        if ($search) {
            $books = $books->where('category_name', 'LIKE', '%' . $search . '%');
        }

        $books = $books->get();

        return view('dashboard', compact('recommended', 'categories', 'books'));
    }

    public function detail($id)
    {
        $books = $this->recommended()->filter(function ($items) use ($id) {
            return $items->id == $id;
        });

        $data = [];
        foreach ($books as $value) {
            $data = $value;
        }

        $comments = DB::table('comments AS a')
            ->select('a.*', 'b.name')
            ->leftJoin('users AS b', 'a.user_id', '=', 'b.id')
            ->where('a.book_id', $id)
            ->whereNull('a.deleted_at')
            ->get();

        return view('contents.detail-books', compact('data', 'comments'));
    }

    public function favorite()
    {
        return view('contents.favorite');
    }

    public function history()
    {
        $subQuery = DB::table('transaction_details AS a')
                    ->select('a.transaction_id', DB::raw('GROUP_CONCAT(a.book_id) AS book_id'))
                    ->groupBy('a.transaction_id');

        $data = DB::table('transactions AS a')
                    ->select('a.*', 'b.name', 'b.email', 'b.phone', 'b.address', 'c.*')
                    ->leftJoin('users AS b', 'a.user_id', '=', 'b.id')
                    ->leftJoinSub($subQuery, 'c', function($join) {
                        $join->on('c.transaction_id', '=', 'a.id');
                    })
                    ->where('user_id', Auth::user()->id)
                    ->get();

        return view('contents.history', compact('data'));
    }
}
