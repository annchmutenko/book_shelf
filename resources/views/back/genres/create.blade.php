@extends('back.layouts.admin')

@section('header-title')
    {{ __("Create genre") }}
@endsection

@section('content')
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 admin-form">
        <form method="post" action="{{ route('admin.genres.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label for="last-name">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') ?? '' }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label for="last-name">Description</label>
                        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                    </div>
                </div>
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
