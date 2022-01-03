@extends('back.layouts.admin')

@section('header-title')
    {{ __("Edit book") }}
@endsection

@section('content')
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 admin-form">
        <form method="post" action="{{ route('admin.books.update', $book) }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <label for="last-name">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $book->title) }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <label for="last-name">Slug</label>
                        <input type="text" name="slug" class="form-control" value="{{ old('slug', $book->slug) }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <label for="last-name">Description</label>
                        <textarea name="description" class="form-control" required>{{ old('description', $book->description) }}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <label>Author</label>
                        <input name="author" class="form-control" value="{{ old('author', $book->author) }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <label>Pages</label>
                        <input name="pages" class="form-control" value="{{ old('pages', $book->pages) }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <label>Cover</label>
                        <input name="cover" class="form-control" value="{{ old('cover', $book->cover) }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <label>Publisher</label>
                        <input name="publisher" class="form-control" value="{{ old('publisher', $book->publisher) }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <label>Language</label>
                        <input name="language" class="form-control" value="{{ old('language', $book->language) }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <label>Price</label>
                        <input name="price" class="form-control" value="{{ old('price', $book->price) }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Genre</label><br>
                <select class="form-control" name="genre_id" id="exampleFormControlSelect1" required>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" {{ $book->genre_id == $genre->id ? 'selected' : '' }}>{{ $genre->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Categories</label><br>
                <select class="form-control" name="categories[]" multiple id="exampleFormControlSelect1" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ in_array($category->id, $book->categories->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <input type="file" name="icon" id="custom-file" class="custom-file-input">
                        <label class="ml-3 custom-file-label" for="custom-file">Upload icon</label>
                        <small>Current icon: <a href="{{ $book->iconUrl }}">{{ $book->iconUrl }}</a></small>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection()
