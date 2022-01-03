<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Genre;
use App\Seo\Breadcrumb;

class CategoryController extends Controller
{
    protected Breadcrumb $breadcrumbs;

    public function __construct(Breadcrumb $breadcrumb)
    {
        $this->breadcrumbs = $breadcrumb;
    }

    public function categories()
    {
        $categories = Category::all();

        $this->breadcrumbs->addCrumb('Home', route('front.home'));
        $this->breadcrumbs->addCrumb('Categories', route('front.categories'));

        return view('front.categories', ['categories' => $categories, 'breadcrumbs' => $this->breadcrumbs]);
    }

    public function genres()
    {
        $genres = Genre::all();

        $this->breadcrumbs->addCrumb('Home', route('front.home'));
        $this->breadcrumbs->addCrumb('Genres', route('front.genres'));

        return view('front.genres', ['genres' => $genres, 'breadcrumbs' => $this->breadcrumbs]);
    }

    public function showCategory(int $id)
    {
        $category = Category::find($id);

        $this->breadcrumbs->addCrumb('Home', route('front.home'));
        $this->breadcrumbs->addCrumb('Categories', route('front.categories'));
        $this->breadcrumbs->addCrumb($category->title, route('front.categories.show', $category->id));

        $books = $category->books;
        return view('front.categories.show', ['category' => $category, 'books' => $books, 'breadcrumbs' => $this->breadcrumbs]);
    }

    public function showGenre(int $id)
    {
        $genre = Genre::find($id);

        $this->breadcrumbs->addCrumb('Home', route('front.home'));
        $this->breadcrumbs->addCrumb('Genres', route('front.genres'));
        $this->breadcrumbs->addCrumb($genre->title, route('front.genres.show', $genre->id));

        $books = $genre->books;
        return view('front.genres.show', ['genre' => $genre, 'books' => $books, 'breadcrumbs' => $this->breadcrumbs]);
    }
}
