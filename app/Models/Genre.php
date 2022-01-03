<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Genre extends Model
{
    protected array $fillable = ['title', 'description', 'icon'];

    public function books()
    {
        return $this->hasMany(Book::class, 'genre_id', 'id');
    }

    public function getIconUrlAttribute(): ?string
    {
        return isset($this->icon) ? Storage::url($this->icon) : null;
    }
}
