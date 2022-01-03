@extends('front.layout.base')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('front.profile.settings') ? 'active' : '' }}" href="{{ route('front.profile.settings') }}">Settings </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('front.profile.orders') }}">Orders </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('front.profile.cart') }}">Cart </a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn nav-link" href="#">Logout </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <section class="about_section layout_padding">
        <div class="container ">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                Settings
                            </h2>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{{ session('error') }}</li>
                                </ul>
                            </div>
                        @endif
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{{ session('success') }}</li>
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('front.profile.update') }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" value="{{ $user->name ?? '' }}" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email ?? '' }}" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Your current password</label>
                                <input type="password" name="current_password" class="form-control" placeholder="Current password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">New password</label>
                                <input type="password" name="new_password" class="form-control" placeholder="New password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirm password</label>
                                <input type="password" name="new_password_confirmation" class="form-control" placeholder="Confirm password">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
