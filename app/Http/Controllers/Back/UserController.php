<?php

namespace App\Http\Controllers\Back;

use App\Filters\User as UserFilter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController
{
    public function index(UserFilter $user)
    {
        $users = $user->filter();
        return view('back.users.index', compact('users'));
    }

    public function create()
    {
        return view('back.users.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->all();
        $this->validate($attributes);
        $user = User::create($attributes);
        return redirect()->route('admin.users.edit', $user)->with('success', 'User successfully created');
    }

    public function edit(User $user)
    {
        return view('back.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $attributes = $request->all();
        $this->validate($attributes, $user);
        if(is_null($attributes['password']))
            unset($attributes['password']);
        $user->update($attributes);
        return redirect()->back()->with('success', 'User successfully updated');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User successfully deleted');
    }

    protected function validate(array $attributes, ?User $user = null)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'nullable|min:6|max:16|confirmed'
        ];
        if(isset($user))
            $rules['email'] = 'required|email|unique:users,email,'.$user->id;

        Validator::validate($attributes, $rules);
    }
}
