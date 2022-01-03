<?php

namespace App\Http\Controllers\Back;

use App\Filters\Book as BookFilter;
use App\Models\Book;
use App\Models\Category;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController
{
    public function index(BookFilter $book)
    {
        $books = $book->filter();
        $genres = Genre::all();
        $categories = Category::all();
        return view('back.books.index', compact('books', 'categories', 'genres'));
    }

    public function create()
    {
        $genres = Genre::all();
        $categories = Category::all();
        return view('back.books.create', compact('genres', 'categories'));
    }

    public function store(Request $request)
    {
        $attributes = $request->all();
        $this->validate($attributes);
        $attributes['icon'] = $request->hasFile('icon') ? $request->file('icon')->store('public/books') : null;
        $book = Book::create($attributes);
        $book->categories()->sync($attributes['categories']);
        return redirect()->route('admin.books.edit', $book)->with('success', 'Book successfully created');
    }

    public function edit(Book $book)
    {
        $genres = Genre::all();
        $categories = Category::all();
        return view('back.books.edit', compact('book', 'genres', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $attributes = $request->all();
        $this->validate($attributes, $book);
        if($request->hasFile('icon')) {
            isset($book->icon) ? Storage::delete($book->icon) : null;
            $attributes['icon'] = $request->file('icon')->store('public/books');
        }
        $book->update($attributes);
        $book->categories()->sync($attributes['categories']);
        return redirect()->back()->with('success', 'Book successfully updated');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Book successfully deleted');
    }

    protected function validate(array $attributes, ?Book $book = null)
    {
        $rules = [
            'title' => 'string|required|max:255',
            'slug' => 'required|string|unique:books,slug',
            'description' => 'required|string',
            'genre_id' => 'required|integer|exists:genres,id',
            'cover' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'price' => 'required|int',
            'is_available' => 'nullable|boolean',
            'language' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'pages' => 'required|int',
            'categories.*' => 'required|int|exists:categories,id',
            'icon' => 'nullable|image|max:1024'
        ];
        if(isset($book))
            $rules['slug'] = 'required|string|unique:books,slug,'.$book->id;

        Validator::validate($attributes, $rules);
    }
}
