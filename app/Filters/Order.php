<?php

namespace App\Filters;

use App\Models\Order as OrderEntity;
use Illuminate\Support\Facades\DB;

class Order extends AbstractFilter
{
    public function filter()
    {
        $builder = OrderEntity::query()->orderBy(DB::raw("FIELD(status, 'pending', 'processing', 'created_at')"));

        if(isset($this->filters['status'])) {
            $builder->where('status', $this->filters['status']);
        }

        return $builder->get();
    }
}
