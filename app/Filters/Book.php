<?php

namespace App\Filters;

use App\Models\Book as BookEntity;

class Book extends AbstractFilter
{
    public function filter()
    {
        $builder = BookEntity::query()->select('books.*')->orderBy('books.created_at');

        if(isset($this->filters['title'])) {
            $builder->where('title', 'like', '%'.$this->filters['title'].'%');
        }

        if(isset($this->filters['genre'])) {
            $builder->where('genre_id', $this->filters['genre']);
        }

        if(isset($this->filters['category'])) {
            $builder->join('category_book as cb', 'cb.book_id', 'books.id')
                ->where('cb.category_id', $this->filters['category']);
        }

        return $builder->get();
    }
}
