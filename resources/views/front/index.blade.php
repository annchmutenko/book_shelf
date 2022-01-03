@extends('front.layout.base')

@section('content')
    <!-- slider section -->
    <section class="slider_section">
        <div class="row">
            <div class="col-12">
                <img class="w-100" style="max-height: 900px" src="{{ asset('img/bookshelf.jpg') }}">
            </div>
        </div>
    </section>
    <!-- end slider section -->


    <!-- catagory section -->

    <section class="catagory_section layout_padding">
        <div class="catagory_container">
            <div class="container ">
                <div class="heading_container heading_center">
                    <h2>
                        Books Categories
                    </h2>
                    <p>
                        There are many categories
                    </p>
                </div>
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-sm-6 col-md-4 ">
                            <div class="box ">
                                <a href="{{ route('front.categories.show', $category->id) }}">
                                    <div class="img-box">
                                        <img src="{{ $category->iconUrl }}" alt="{{ $category->title }}">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            {{ $category->title }}
                                        </h5>
                                        <p>
                                            {{ $category->description }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- end catagory section -->

    <section class="catagory_section layout_padding">
        <div class="catagory_container">
            <div class="container ">
                <div class="heading_container heading_center">
                    <h2>
                        Books Genres
                    </h2>
                    <p>
                        There are many genres
                    </p>
                </div>
                <div class="row">
                    @foreach($genres as $genre)
                        <div class="col-sm-6 col-md-4 ">
                            <div class="box ">
                                <a href="{{ route('front.genres.show', $category->id) }}">
                                    <div class="img-box">
                                        <img src="{{ $genre->iconUrl }}" alt="{{ $genre->title }}">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            {{ $genre->title }}
                                        </h5>
                                        <p>
                                            {{ $genre->description }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <!-- about section -->

    <section class="about_section layout_padding">
        <div class="container ">
            <div class="row">
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="images/about-img.png" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                About Our Bookstore
                            </h2>
                        </div>
                        <p>
                            Why is our bookstore chosen by millions of readers from all over Ukraine? The answer is simple: we do not sell books, but vivid emotions. Being the leader of publishing and the largest distributor of book products in Ukraine, "Family Leisure Club" tries to please every client.
                        </p>
                        <p>
                            Convenient methods of payment for goods, prompt delivery of orders by popular carriers throughout Ukraine, as well as preferential shipping conditions for a certain amount of purchase are some more reasons to join our book club. Join us!
                        </p>
                        <a href="{{ route('front.about') }}">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end about section -->

    <!-- client section -->

    <section class="client_section layout_padding">
        <div class="container ">
            <div class="heading_container heading_center">
                <h2>
                    What Says Customers
                </h2>
                <hr>
            </div>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="client_container ">
                        <div class="detail-box">
                            <p>
                                Editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by
                            </p>
                            <span>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </span>
                        </div>
                        <div class="client_id">
                            <div class="img-box">
                                <img src="images/c1.jpg" alt="">
                            </div>
                            <div class="client_name">
                                <h5>
                                    Jone Mark
                                </h5>
                                <h6>
                                    Student
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mx-auto">
                    <div class="client_container ">
                        <div class="detail-box">
                            <p>
                                Editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by
                            </p>
                            <span>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </span>
                        </div>
                        <div class="client_id">
                            <div class="img-box">
                                <img src="images/c2.jpg" alt="">
                            </div>
                            <div class="client_name">
                                <h5>
                                    Anna Crowe
                                </h5>
                                <h6>
                                    Student
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mx-auto">
                    <div class="client_container ">
                        <div class="detail-box">
                            <p>
                                Editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by
                            </p>
                            <span>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </span>
                        </div>
                        <div class="client_id">
                            <div class="img-box">
                                <img src="images/c3.jpg" alt="">
                            </div>
                            <div class="client_name">
                                <h5>
                                    Hilley James
                                </h5>
                                <h6>
                                    Student
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end client section -->
@endsection
