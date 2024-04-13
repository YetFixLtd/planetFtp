@extends('frontEnd.master')

@section('title')
    Home
@endsection

@php
    $products = DB::table('products')
        ->where('publicationStatus', 1)
        ->where('categoryId', 1)
        ->orderBy('id', 'desc')
        ->get();
@endphp

@section('main-content')
    
    <main>
        <h3 class="recent-movie-text"> Recent 
            movies is not scrolling</h3>
        <div class="news-container">
            <div class="tab-content news-content clearfix">
                <div class="tab-pane active load-post-body" id="news-stories">
                    <div style="grid grid-template-columns:6; grid-template-rows:4;max-width:1816px; margin:auto;"
                        id="movieContainer">
                        @foreach ($items as $product)
                            <div class="post post-height hover-img-scale wow fadeInUp " data-rating="5"
                                data-wow-duration="0.7s" data-wow-offset="0">
                                <div class="post-wrapper">
                                    <a class="image" onclick="UpdateHits('23626','visit')"
                                        href="{{ url('/movie/' . $product->id) }}"><img
                                            src="{{ asset($product->productFile) }}" alt="{{ $product->productTitle }}"
                                            style="width: 100%; height: 100%;" /></a>
                                    <div class="block">
                                        <div class="title">
                                            {{ $product->productTitle }}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>

    </main>

    {{-- <script>
        let page = 3;


        window.addEventListener('scroll', () => {
            const {
                scrollTop,
                scrollHeight,
                clientHeight
            } = document.documentElement;

            if (scrollTop + clientHeight >= scrollHeight) {
                async function getNewMovies() {
                    const response = await fetch(`{{ route('recentMovie') }}?page=${page}`);
                    const movieParameter = await response.json();


                    const {
                        movies: {
                            data: newMovies
                        }
                    } = movieParameter;

                    newMovies.map(movie => {
                        const movieElement = document.createElement('div');
                        movieElement.classList.add('post', 'post-height', 'hover-img-scale', 'wow',
                            'fadeInUp', );
                        movieElement.setAttribute('data-rating', '5');
                        movieElement.setAttribute('data-wow-duration', '0.7s');
                        movieElement.setAttribute('data-wow-offset', '0');

                        movieElement.innerHTML = `<div class="post-wrapper">
                            <a class="image" onclick="UpdateHits('23626','visit')" href="${'movie/'+movie.id}"><img
                                    src="${movie.productFile}"
                                    alt="${movie.productTitle}"
                                    style="width: 100%; height: 100%;" /></a>
                            <div class="block">
                                <div class="title">
                                    ${movie.productTitle}
                                </div>
                            </div>
                        </div>`;
                        const movieContainer = document.getElementById('movieContainer');
                        movieContainer.appendChild(movieElement);



                    });

                    page++;

                }
                getNewMovies();
            }
        });
    </script> --}}
@endsection
