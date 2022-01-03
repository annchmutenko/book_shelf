@extends('back.layouts.admin')

@section('header-title')
    {{ __("Books") }}
@endsection

@section('utils')
    <div class="utils h-25 mt-3">
        <div class="filter">
            <div class="extended-filter">
                <div class="title">
                    {{ __("Filter") }}
                </div>
                <div class="extended-filters-fields">
                    <form action="{{ route('admin.books.index') }}" method="get">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <label for="department">Title</label><br>
                                    <input type="text" name="filters[title]" class="form-control"/>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label>Genre</label><br>
                                        <select class="form-control" name="filters[genre]" id="exampleFormControlSelect1">
                                            <option value=""></option>
                                            @foreach($genres as $genre)
                                                <option value="{{ $genre->id }}">{{ $genre->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label>Category</label><br>
                                        <select class="form-control" name="filters[category]" id="exampleFormControlSelect1">
                                            <option value=""></option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Apply</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="buttons-group">
            <a class="btn-info p-2" href="{{ route('admin.books.create') }}">{{ __('Create') }}</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(count($books) == 0)
                    <div class="item p-6 bg-white border-b border-gray-200">
                        {{ __('There is nothing here yet') }}
                    </div>
                @endif
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Categories</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Updated at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($books as $book)
                        <tr>
                            <th scope="row">{{ $book->id }}</th>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->genre->title }}</td>
                            <td>{!! $book->categoriesToString !!}</td>
                            <td>{{ $book->created_at }}</td>
                            <td>{{ $book->updated_at->diffForHumans() }}</td>
                            <td><a href="{{ route('admin.books.edit', $book) }}" class="btn btn-sm btn-info">Edit</a></td>
                            <td><a class="btn btn-danger btn-sm request-delete" href="{{ route('admin.books.destroy', $book) }}" datatype="delete">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection()
