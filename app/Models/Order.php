<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected array $fillable = ['user_id', 'status', 'city', 'post_office'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'order_book', 'order_id', 'book_id');
    }

    public function getBooksUrlAttribute()
    {
        $books = $this->books;
        $stringBooks = '';
        $i = 0;
        foreach ($books as $book) {
            if($i != 0)
                $stringBooks .= ', ';
            $stringBooks .= "<a href='".route('front.books.show', $book->slug)."'>{$book->title}</a>";
            ++$i;
        }
        return $stringBooks;
    }
}
