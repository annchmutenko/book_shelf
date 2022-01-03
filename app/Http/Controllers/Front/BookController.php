<?php


namespace App\Http\Controllers\Front;


use App\Models\Book;
use App\Seo\Breadcrumb;

class BookController
{
    protected Breadcrumb $breadcrumbs;

    public function __construct(Breadcrumb $breadcrumb)
    {
        $this->breadcrumbs = $breadcrumb;
    }

    public function show(string $slug)
    {
        $book = Book::query()->where('slug', $slug)->first();

        $this->breadcrumbs->addCrumb('Home', route('front.home'));
        $this->breadcrumbs->addCrumb('Genres', route('front.genres'));
        $this->breadcrumbs->addCrumb($book->genre->title, route('front.genres.show', $book->genre_id));
        $this->breadcrumbs->addCrumb($book->title, route('front.books.show', $book->slug));

        $similarBooks = $book->genre->books()->where('books.id', '!=', $book->id)->limit(3)->get();

        return view('front.books.show', ['book' => $book, 'breadcrumbs' => $this->breadcrumbs, 'similarBooks' => $similarBooks]);
    }
}
