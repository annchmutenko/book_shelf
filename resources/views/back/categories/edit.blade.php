@extends('back.layouts.admin')

@section('header-title')
    {{ __("Edit category") }}
@endsection

@section('content')
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 admin-form">
        <form method="post" action="{{ route('admin.categories.update', $category) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label for="last-name">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $category->title }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label>Description</label>
                        <textarea name="description" class="form-control">{{ $category->description }}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <input type="file" name="icon" id="custom-file" class="custom-file-input">
                        <label class="ml-3 custom-file-label" for="custom-file">Upload icon</label>
                        @if(isset($category->icon))
                            <small>Current icon: <a href="{{ $category->iconUrl }}">{{ $category->iconUrl }}</a></small>
                        @endif
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection()
