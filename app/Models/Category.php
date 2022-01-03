<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    protected array $fillable = ['title', 'description', 'icon'];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'category_book', 'category_id', 'book_id');
    }

    public function getIconUrlAttribute(): ?string
    {
        return isset($this->icon) ? Storage::url($this->icon) : null;
    }
}
