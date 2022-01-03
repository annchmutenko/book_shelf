<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <link rel="icon" href="images/favicon.png" type="image/gif" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <meta name="token" content="{{ csrf_token() }}">

    <title>Bookshelf</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')}}" />
    <!-- font awesome style -->
    <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/front/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('css/front/responsive.css') }}" rel="stylesheet" />

</head>

<body class="sub_page">

<div id="app">
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="{{ route('front.home') }}">
            <span>
              Bookshelf
            </span>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                @auth
                                    <a class="nav-link pl-lg-0" href="{{ route('front.profile.settings') }}">{{ auth()->user()->name }}</a>
                                @else
                                    <a class="nav-link pl-lg-0" href="{{ route('login') }}">Sign in</a>
                                @endauth
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('front.home') }}">Home </a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('front.about') }}"> About <span class="sr-only">(current)</span> </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('front.categories') }}">Categories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('front.genres') }}">Genres</a>
                            </li>
                        </ul>
                        <book-search></book-search>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->
    </div>

    @yield('content')

    <footer class="footer_section">
        <section class="info_section layout_padding2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 info-col">
                        <div class="info_detail">
                            <h4>
                                About Us
                            </h4>
                            <p class="text-white">
                                Why is our bookstore chosen by millions of readers from all over Ukraine? The answer is simple: we do not sell books, but vivid emotions. Being the leader of publishing and the largest distributor of book products in Ukraine, "Family Leisure Club" tries to please every client.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 info-col">
                        <div class="info_contact">
                            <h4>
                                Address
                            </h4>
                            <div class="contact_link_box">
                                <a href="">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <span>
                  Location
                </span>
                                </a>
                                <a href="">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <span>
                  Call +01 1234567890
                </span>
                                </a>
                                <a href="">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <span>
                  demo@gmail.com
                </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <p>
                &copy; <span id="displayYear"></span> All Rights Reserved By
                <a href="https://html.design/">Free Html Templates</a>
            </p>
        </div>
    </footer>
    <!-- footer section -->
</div>

<script src="{{ asset('js/app.js') }}"></script>
<!-- jQery -->
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<!-- bootstrap js -->
<script src="{{ asset('js/bootstrap.js') }}"></script>
<!-- custom js -->
<script src="{{ asset('js/front/custom.js') }}"></script>

@yield('js')
<!-- End Google Map -->
</body>

</html>
