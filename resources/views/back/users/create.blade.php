@extends('back.layouts.admin')

@section('header-title')
    {{ __("Create user") }}
@endsection

@section('content')
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 admin-form">
        <form method="post" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') ?? '' }}" id="name" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') ?? '' }}" id="email" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label for="password_conf">Confirm password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmed" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label for="role">Role</label>
                        <select class="form-control" name="role" required>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection()
