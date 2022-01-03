@extends('back.layouts.admin')

@section('header-title')
    {{ __("Create book") }}
@endsection

@section('content')
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 admin-form">
        <form method="post" action="{{ route('admin.books.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <label for="last-name">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') ?? '' }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <label for="last-name">Slug</label>
                        <input type="text" name="slug" class="form-control" value="{{ old('slug') ?? '' }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <label for="last-name">Description</label>
                        <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <label>Author</label>
                        <input name="author" class="form-control" value="{{ old('author') }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <label>Pages</label>
                        <input name="pages" class="form-control" value="{{ old('pages') }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <label>Cover</label>
                        <input name="cover" class="form-control" value="{{ old('cover') }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <label>Publisher</label>
                        <input name="publisher" class="form-control" value="{{ old('publisher') }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <label>Language</label>
                        <input name="language" class="form-control" value="{{ old('language') }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <label>Price</label>
                        <input name="price" class="form-control" value="{{ old('price') }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Genre</label><br>
                <select class="form-control" name="genre_id" id="exampleFormControlSelect1" required>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Categories</label><br>
                <select class="form-control" name="categories[]" multiple id="exampleFormControlSelect1" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <input type="file" name="icon" id="custom-file" class="custom-file-input">
                        <label class="ml-3 custom-file-label" for="custom-file">Upload icon</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection()
