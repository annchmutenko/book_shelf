@extends('front.layout.base')

@section('content')
    <!-- catagory section -->
    {{ $breadcrumbs }}
    <section class="catagory_section layout_padding">
        <div class="catagory_container">
            <div class="container ">
                <div class="heading_container heading_center">
                    <h2>
                        Books Genres
                    </h2>
                    <p>
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
                    </p>
                </div>
                <div class="row">
                    @foreach($genres as $genre)
                        <div class="col-sm-6 col-md-4 ">
                            <div class="box ">
                                <a href="{{ route('front.genres.show', $genre->id) }}">
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

    <!-- end catagory section -->

    <!-- info section -->

    <section class="info_section layout_padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 info-col">
                    <div class="info_detail">
                        <h4>
                            About Us
                        </h4>
                        <p>
                            Vitae aut explicabo fugit facere alias distinctio, exem commodi mollitia minusem dignissimos atque asperiores incidunt vel voluptate iste
                        </p>
                        <div class="info_social">
                            <a href="">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 info-col">
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
                <div class="col-md-6 col-lg-3 info-col">
                    <div class="info_contact">
                        <h4>
                            Newsletter
                        </h4>
                        <form action="#">
                            <input type="text" placeholder="Enter email" />
                            <button type="submit">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 info-col">
                    <div class="map_container">
                        <div class="map">
                            <div id="googleMap"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
