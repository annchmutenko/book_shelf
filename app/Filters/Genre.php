<?php

namespace App\Filters;

use App\Models\Genre as GenreEntity;

class Genre extends AbstractFilter
{
    public function filter()
    {
        $builder = GenreEntity::query()->latest();

        if(isset($this->filters['title'])) {
            $builder->where('title', 'like', '%'.$this->filters['title'].'%');
        }

        return $builder->get();
    }
}
