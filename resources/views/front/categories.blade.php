@extends('front.layout.base')

@section('content')
    <!-- catagory section -->
    {{ $breadcrumbs }}
    <section class="catagory_section layout_padding">
        <div class="catagory_container">
            <div class="container ">
                <div class="heading_container heading_center">
                    <h2>
                        Books @if(request()->routeIs('front.categories')) Categories @else Genres @endif
                    </h2>
                    <p>
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
                    </p>
                </div>
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-sm-6 col-md-4 catagory_section">
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
@endsection
