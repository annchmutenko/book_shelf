@extends('back.layouts.admin')

@section('header-title')
    {{ __("Edit genre") }}
@endsection

@section('content')
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 admin-form">
        <form method="post" action="{{ route('admin.orders.update', $order) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="last-name">City</label>
                        <input type="text" class="form-control" value="{{ $order->city }}" readonly>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="last-name">Post office</label>
                        <input type="text" class="form-control" value="{{ $order->post_office }}" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label for="last-name">User</label>
                        <input type="text" class="form-control" value="{{ $order->user->name }}" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label>Cost</label>
                        <input class="form-control" value="{{ $order->books->sum('price') }}" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Status</label><br>
                <select class="form-control" name="status" id="exampleFormControlSelect1">
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                    <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                    <option value="finished" {{ $order->status == 'finished' ? 'selected' : '' }}>Finished</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection()
