@extends('back.layouts.admin')

@section('header-title')
    {{ __("Редагування користувача") }}
@endsection

@section('content')
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 admin-form">
        <form method="post" action="{{ route('admin.users.update', $user) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" id="name" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email', $user->email) }}" id="email" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label for="password_conf">Confirm password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmed" >
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label for="role">Role</label>
                        <select class="form-control" name="role" required>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection()
