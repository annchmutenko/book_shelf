<?php

namespace App\Filters;

use Illuminate\Http\Request;

abstract class AbstractFilter
{
    protected array $filters = [];

    public function __construct(Request $request)
    {
        $filters = $request->all('filters');
        $this->filters = isset($filters['filters']) ? $filters['filters'] : [];
    }

    abstract public function filter();
}
