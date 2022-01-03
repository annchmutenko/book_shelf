<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $user = $this->user();
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'current_password' => 'nullable|min:6|max:16',
            'new_password' => 'nullable|min:6|max:16|confirmed|required_with:current_password'
        ];
    }
}

