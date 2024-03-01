<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index($search = null)
    {
        // Rating
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

        $recommended = DB::table('books')
            ->whereNull('deleted_at')
            ->get();

        foreach ($recommended as $key => $value) {
            if ($value->id == $rating[$key]->book_id) {
                $value->rating = $rating[$key]->rating * 2;
                $value->rating_true = $rating[$key]->rating;
            } else {
                $value->rating = 0;
            }
        }

        $c = $recommended->filter(function ($items) {
            return $items->rating >= 8;
        });
        // Rating

        $categories = DB::table('categories')->whereNull('deleted_at')->get();

        $subQuery = DB::table('full_category AS b')
            ->leftJoin('categories AS c', 'b.category_id', '=', 'c.id')
            ->select('b.book_id', DB::raw('GROUP_CONCAT(c.name) AS category_name'))
            ->groupBy('b.book_id');

        $books = DB::table('books AS a')
            ->rightJoinSub($subQuery, 'd', function ($query) {
                $query->on('d.book_id', '=', 'a.id');
            })
            ->select('a.*', 'd.category_name')
            ->whereNull('deleted_at');

        if ($search != null) {
            $books = $books->where('category_name', 'LIKE', '%' . $search . '%');
        }

        $books = $books->get();

        return view('dashboard', ['categories' => $categories, 'books' => $books, 'recommended' => $c]);
    }

    public function detail($id)
    {
        // Rating
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

        $recommended = DB::table('books')
            ->whereNull('deleted_at')
            ->get();

        foreach ($recommended as $key => $value) {
            if ($value->id == $rating[$key]->book_id) {
                $value->rating = $rating[$key]->rating * 2;
                $value->rating_true = $rating[$key]->rating;
            } else {
                $value->rating = 0;
            }
        }

        $recommended = $recommended->filter(function ($items) {
            return $items->rating >= 8;
        });
        // Rating

        $categories = DB::table('categories')->whereNull('deleted_at')->get();

        $subQuery = DB::table('full_category AS b')
            ->leftJoin('categories AS c', 'b.category_id', '=', 'c.id')
            ->select('b.book_id', DB::raw('GROUP_CONCAT(c.name) AS category_name'))
            ->groupBy('b.book_id');

        $books = DB::table('books AS a')
            ->rightJoinSub($subQuery, 'd', function ($query) {
                $query->on('d.book_id', '=', 'a.id');
            })
            ->select('a.*', 'd.category_name')
            ->whereNull('deleted_at')
            ->get();

        $detailBook = DB::table('books')
            ->whereNull('deleted_at')
            ->where('id', $id)
            ->first();

        foreach ($rating as $key => $value) {
            if ($value->book_id == $detailBook->id) {
                $detailBook->rating = $value->rating * 2;
                $detailBook->rating_true = $value->rating;
            }
        }

        return view('home.books.detail',  ['categories' => $categories, 'books' => $books, 'recommended' => $recommended, 'detail' => $detailBook]);
    }
}
