<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Genre;

class HomeController
{
    public function index()
    {
        $categories = Category::all();
        $genres = Genre::all();
        return view('front.index', ['categories' => $categories, 'genres' => $genres]);
    }

    public function about()
    {
        return view('front.about');
    }
}
