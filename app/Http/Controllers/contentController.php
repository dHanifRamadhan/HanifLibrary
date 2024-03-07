<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contentController extends Controller
{
    public function dashboard()
    {
        $recommended = [];
        $category = [];

        for ($i = 0; $i < 8; $i++) {
            $random = rand(1, 10);
            $recommended[] = (object) [
                'title' => 'Book ' . $i,
                'author' => 'Author ' . $i,
                'picture' => 'https://i.pinimg.com/564x/d3/4d/c1/d34dc16977d5a06b31fa0316e6a574f0.jpg',
                'bottom_color' => '#111',
                'right_color' => '#222',
                'cover_color' => '#000',
                'rating' => $random,
                'rating_true' => $random
            ];

            $category[] = (object)[
                'name' => 'Category ' . "$i",
            ];
        }


        return view('dashboard', ['recommended' => $recommended, 'category' => $category]);
    }

    public function detail()
    {

        $data = (object)[
            'title' => 'Alice Neverland',
            'author' => 'Jeni Conrad',
            'publisher' => 'SMK Informatika Utama',
            'year_published' => 'Senin, 21 Januari 2020',
            'sinopsis' => 'Aku hanya lah seorang pemula yang sedang belajar',
            'rating' => 10,
            'qty' => 100,
            'price' => 100000,
            'category_name' => 'Fantasy, Adventure'
        ];

        return view('contents.detail-books', ['data' => $data]);
    }
}
