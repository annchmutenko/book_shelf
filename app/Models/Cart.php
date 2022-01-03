<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected array $fillable = ['user_id', 'book_id', 'amount'];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
