@extends('back.layouts.admin')

@section('header-title')
    {{ __("Categories") }}
@endsection

@section('utils')
    <div class="utils h-25 mt-3">
        <div class="filter">
            <div class="extended-filter">
                <div class="title">
                    {{ __("Filter") }}
                </div>
                <div class="extended-filters-fields">
                    <form action="{{ route('admin.categories.index') }}" method="get">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label for="department">Title</label><br>
                                    <input type="text" name="filters[title]" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Apply</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="buttons-group">
            <a class="btn-info p-2" href="{{ route('admin.categories.create') }}">{{ __('Create') }}</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(count($categories) == 0)
                    <div class="item p-6 bg-white border-b border-gray-200">
                        {{ __('There is nothing here yet') }}
                    </div>
                @endif
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Updated at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>{{ $category->updated_at->diffForHumans() }}</td>
                            <td><a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-info">Edit</a></td>
                            <td><a class="btn btn-danger btn-sm request-delete" href="{{ route('admin.categories.destroy', $category) }}" datatype="delete">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection()
