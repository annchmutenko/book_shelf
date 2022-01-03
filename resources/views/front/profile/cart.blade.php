@extends('front.layout.base')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('front.profile.settings') }}">Settings </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('front.profile.orders') }}">Orders </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('front.profile.cart') }}">Cart </a>
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
    <section class="h-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="row">
                                <cart-items inline-template :cart-props="{{ $cart->toJson() }}">
                                    <div class="col-12" v-if="numberOfBooks > 0">
                                        <h5 class="mb-3"><a href="/categories" class="text-body"><i
                                                    class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                                        <hr>

                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <div>
                                                <p class="mb-1">Shopping cart</p>
                                                <p class="mb-0">You have @{{ numberOfBooks }} items in your cart</p>
                                            </div>
                                        </div>
                                        <div class="card mb-3" v-for="item in cart">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div>
                                                            <img
                                                                :src="item.book.icon"
                                                                class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                                        </div>
                                                        <div class="ml-3">
                                                            <h5>@{{ item.book.title }}</h5>
                                                            <p class="small mb-0">@{{ item.book.author }}, @{{ item.book.pages }} pages</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div style="width: 90px;">
                                                            <h5 class="mb-0">@{{ item.book.price }} UAH</h5>
                                                        </div>
                                                        <a href="#" style="color: #cecece;" @click.prevent="deleteFromCart(item)"><i class="fas fa-trash-alt delete-from-cart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">

                                                <div class="card bg-primary text-white rounded-3">
                                                    <div class="card-body">

                                                        <div class="d-flex justify-content-between">
                                                            <p class="mb-2">Total</p>
                                                            <p class="mb-2">@{{ total }} UAH</p>
                                                        </div>
                                                        <button type="button" class="btn btn-info btn-block btn-lg">
                                                            <div class="d-flex justify-content-between">
                                                                <span>@{{ total }} UAH</span>
                                                                <span><a href="/make-order">Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></a></span>
                                                            </div>
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div v-else>
                                        <div class="col-12">
                                            <h5 class="mb-3">There is nothing here yet</h5>
                                        </div>
                                    </div>
                                </cart-items>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
