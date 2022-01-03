@extends('front.layout.base')

@section('content')
    {{ $breadcrumbs }}
    <!-- catagory section -->
    <section class="catagory_section layout_padding">
        <div class="book_container">
            <div class="container ">
                <div class="heading_container heading_center">
                    <h2>
                        {{ $book->title }}
                    </h2>
                </div>
                <div class="row">
                    <div class="col-12 col-md-3">
                        <img class="h-100 w-100" src="{{ $book->iconUrl }}">
                    </div>
                    <div class="col-12 col-md-9">
                        <p>Author: {{ $book->author }}</p>
                        <p>Pages: {{ $book->pages }}</p>
                        <p>Language: {{ $book->language }}</p>
                        <p>Genre: <a href="{{ route('front.genres.show', $book->genre_id) }}">{{ $book->genre->title }}</a></p>
                        <p>Categories: {!! empty($book->categoriesToString) ? 'None' : $book->categoriesToString !!}</p>
                        <p>Cover: {{ $book->cover }}</p>
                    </div>
                </div>
                @if(auth()->check())
                    <div class="buy mt-2">
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <span class="font-weight-bold" aria-describedby="availability">{{ $book->price }} UAH</span>
                                        <small class="{{ $book->is_available ? 'text-success' : 'text-danger' }}" id="availability">{{ $book->is_available ? 'Available' : 'Not available' }}</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <cart :book-props="{{ $book }}" :user-props="{{ auth()->user() }}" inline-template>
                                            <button class="btn btn-success" @click.prevent="addToCart">Buy</button>
                                        </cart>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif
                    <div class="description-block mt-2">
                        <div class="row">
                            <div class="col-12">
                                <h3>About the book</h3>
                            </div>
                            <div class="col-12">
                                {{ $book->description }}
                            </div>

                        </div>
                    </div>
                    <div class="similar-block mt-2">
                        <div class="row">
                            <div class="col-12">
                                <h3>Similar books</h3>
                            </div>
                            <div class="col-12">
                                @if($similarBooks->count() == 0)
                                    <p>There is nothing here yet</p>
                                @endif
                                @foreach($similarBooks as $similarBook)
                                    <div class="col-sm-6 col-md-4 ">
                                        <div class="box ">
                                            <a href="{{ route('front.books.show', $similarBook->slug) }}">
                                                <div class="img-box">
                                                    <img src="{{ $similarBook->iconUrl }}" alt="{{ $similarBook->title }}">
                                                </div>
                                                <div class="detail-box">
                                                    <h5>
                                                        {{ $similarBook->title }}
                                                    </h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
            </div>
        </div>
    </section>

@endsection
