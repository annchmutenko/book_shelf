@extends('back.layouts.admin')

@section('header-title')
    {{ __("Orders") }}
@endsection

@section('utils')
    <div class="utils h-25 mt-3">
        <div class="filter">
            <div class="extended-filter">
                <div class="title">
                    {{ __("Filter") }}
                </div>
                <div class="extended-filters-fields">
                    <form action="{{ route('admin.orders.index') }}" method="get">
                        <div class="form-group">
                            <label>Status</label><br>
                            <select class="form-control" name="filters[status]" id="exampleFormControlSelect1">
                                <option value=""></option>
                                <option value="pending">Pending</option>
                                <option value="processing">Processing</option>
                                <option value="canceled">Canceled</option>
                                <option value="finished">Finished</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Apply</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(count($orders) == 0)
                    <div class="item p-6 bg-white border-b border-gray-200">
                        {{ __('There is nothing here yet') }}
                    </div>
                @endif
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Updated at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <th scope="row">{{ $order->id }}</th>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->books->sum('price') }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->updated_at->diffForHumans() }}</td>
                            <td><a href="{{ route('admin.orders.edit', $order) }}" class="btn btn-sm btn-info">Edit</a></td>
                            <td><a class="btn btn-danger btn-sm request-delete" href="{{ route('admin.orders.destroy', $order) }}" datatype="delete">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection()
