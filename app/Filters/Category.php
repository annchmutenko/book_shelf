<?php

namespace App\Filters;

use App\Models\Category as CategoryEntity;

class Category extends AbstractFilter
{
    public function filter()
    {
        $builder = CategoryEntity::query()->latest();

        if(isset($this->filters['title'])) {
            $builder->where('title', 'like', '%'.$this->filters['title'].'%');
        }

        return $builder->get();
    }
}
