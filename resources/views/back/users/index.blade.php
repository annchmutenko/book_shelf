@extends('back.layouts.admin')

@section('header-title')
    {{ __("Users") }}
@endsection

@section('utils')
    <div class="utils h-25 mt-3">
        <div class="filter">
            <div class="extended-filter">
                <div class="title">
                    {{ __("Filter") }}
                </div>
                <div class="extended-filters-fields">
                    <form action="{{ route('admin.users.index') }}" method="get">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <label for="department">Name</label><br>
                                    <input type="text" name="filters[Name]" class="form-control"/>
                                </div>
                                <div class="col-12 col-md-3">
                                    <label for="department">Email</label><br>
                                    <input type="text" name="filters[email]" class="form-control"/>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <label for="role">Role</label>
                                    <select class="form-control" name="filters[role]">
                                        <option value=""></option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Apply</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="buttons-group">
            <a class="btn-info p-2" href="{{ route('admin.users.create') }}">{{ __('Create') }}</a>
        </div>
    </div>
@endsection

        @section('content')
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        @if(count($users) == 0)
                            <div class="item p-6 bg-white border-b border-gray-200">
                                {{ __('Користувачі відсутні') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{!! $user->email !!}</td>
                                    <td>{{ $user->role  }}</td>
                                    <td><a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-info">Edit</a></td>
                                    <td><a class="btn btn-danger btn-sm request-delete" href="{{ route('admin.users.destroy', $user) }}" datatype="delete">Delete</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
@endsection()
