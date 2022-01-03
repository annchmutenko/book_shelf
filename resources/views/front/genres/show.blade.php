@extends('front.layout.base')

@section('content')
    <!-- catagory section -->
    {{ $breadcrumbs }}
    <section class="catagory_section layout_padding">
        <div class="catagory_container">
            <div class="container ">
                <div class="heading_container heading_center">
                    <h2>
                        {{ $genre->title }}
                    </h2>
                </div>
                <div class="row">
                    @if($books->count() == 0)
                        <div class="container heading_container heading_center">
                            <h3>There is nothing here yet</h3>
                        </div>
                    @endif
                    @foreach($books as $book)
                        <div class="col-sm-6 col-md-4 ">
                            <div class="box ">
                                <a href="{{ route('front.books.show', $book->slug) }}">
                                    <div class="img-box">
                                        <img src="{{ $book->iconUrl }}" alt="{{ $book->title }}">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            {{ $book->title }}
                                        </h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
