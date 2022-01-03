<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorized()
    {
        return true;
    }

    public function rules()
    {
        return [
            'city' => 'required|string|max:100',
            'post_office' => 'required|string|max:100'
        ];
    }
}
