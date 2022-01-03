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
                    <a class="nav-link active" href="{{ route('front.profile.orders') }}">Orders </a>
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

    <section class="catagory_section layout_padding">
        <div class="container ">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                Orders
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
                        <div class="row">
                            <div class="col-12">
                                @if($orders->count() == 0)
                                    <h3>There is nothing here yet</h3>
                                @endif
                                @foreach($orders as $order)
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div class="ml-3">
                                                        <h5>{{ $order->city }}</h5>
                                                        <p class="small mb-0">{{ $order->post_office }}</p>
                                                    </div>
                                                </div>
                                                <div>
                                                    {!! $order->booksUrl !!}
                                                </div>
                                                <div class="d-flex flex-row align-items-center">
                                                    <div style="width: 90px;">
                                                        <h5 class="mb-0">{{ $order->status }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
