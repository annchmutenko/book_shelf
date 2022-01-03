<?php

namespace App\Http\Controllers\Back;

use App\Filters\Genre as GenreFilter;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GenreController
{
    public function index(GenreFilter $genre)
    {
        $genres = $genre->filter();
        return view('back.genres.index', compact('genres'));
    }

    public function create()
    {
        return view('back.genres.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->all();
        $this->validate($attributes);
        $attributes['icon'] = $request->hasFile('icon') ? $request->file('icon')->store('public/genres') : null;
        $genre = Genre::create($attributes);
        return redirect()->route('admin.genres.edit', $genre)->with('success', 'Genre successfully created');
    }

    public function edit(Genre $genre)
    {
        return view('back.genres.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre)
    {
        $attributes = $request->all();
        $this->validate($attributes);
        if($request->hasFile('icon')) {
            isset($genre->icon) ? Storage::delete($genre->icon) : null;
            $attributes['icon'] = $request->file('icon')->store('public/genres');
        }
        $genre->update($attributes);
        return redirect()->back()->with('success', 'Genre successfully updated');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('admin.genres.index')->with('success', 'Genre successfully deleted');
    }

    protected function validate(array $attributes)
    {
        Validator::validate($attributes, [
            'title' => 'string|required|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|max:1024'
        ]);
    }
}
