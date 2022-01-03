<?php

namespace App\Http\Controllers\Back;

use App\Models\Category;
use App\Filters\Category as CategoryFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController
{
    public function index(CategoryFilter $category)
    {
        $categories = $category->filter();
        return view('back.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('back.categories.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->all();
        $this->validate($attributes);
        $attributes['icon'] = $request->hasFile('icon') ? $request->file('icon')->store('public/categories') : null;
        $category = Category::create($attributes);
        return redirect()->route('admin.categories.edit', $category)->with('success', 'Category successfully created');
    }

    public function edit(Category $category)
    {
        return view('back.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $attributes = $request->all();
        $this->validate($attributes);
        if($request->hasFile('icon')) {
            isset($category->icon) ? Storage::delete($category->icon) : null;
            $attributes['icon'] = $request->file('icon')->store('public/categories');
        }
        $category->update($attributes);
        return redirect()->back()->with('success', 'Category successfully updated');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category successfully deleted');
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
