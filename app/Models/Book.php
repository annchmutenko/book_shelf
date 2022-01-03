<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    protected array $fillable = ['title', 'slug', 'description', 'author', 'icon', 'cover', 'author', 'pages', 'publisher', 'price', 'is_available', 'language', 'genre_id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_book', 'book_id', 'category_id');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id', 'id');
    }

    public function getIconUrlAttribute(): ?string
    {
        return isset($this->icon) ? Storage::url($this->icon) : null;
    }

    public function getCategoriesToStringAttribute()
    {
        $categories = $this->categories;
        $stringCategories = '';
        foreach ($categories as $category) {
            $stringCategories .= "<a href='".route('front.categories.show', $category->id)."'>{$category->title}</a> ";
        }
        return $stringCategories;
    }
}
