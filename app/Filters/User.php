<?php

namespace App\Filters;

use App\Models\User as UserEntity;

class User extends AbstractFilter
{
    public function filter()
    {
        $builder = UserEntity::query()->latest();

        if(isset($this->filters['name'])) {
            $builder->where('name', 'like', '%'.$this->filters['name'].'%');
        }

        if(isset($this->filters['email'])) {
            $builder->where('email', 'like', '%'.$this->filters['email'].'%');
        }

        if(isset($this->filters['role'])) {
            $builder->where('role', $this->filters['role']);
        }

        return $builder->get();
    }
}
