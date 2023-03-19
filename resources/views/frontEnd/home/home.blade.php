@extends('frontEnd.master')

@section('title')
    Home
@endsection

@php
    $products = DB::table('products')
        ->where('publicationStatus', 1)
        ->where('categoryId', 1)
        ->orderBy('id', 'desc')
        ->limit(24)
        ->get();
@endphp

@section('main-content')
    @include('frontEnd.includes.slider')
    <main>
        <h2 class="recent-movie-text">
            Recent movies</h2>
        <div class="news-container">
            <div class="tab-content news-content clearfix">
                <div class="tab-pane active load-post-body" id="news-stories">
                    <div class="content news-gallery">
                        @foreach ($products as $product)
                            <div class="post post-height hover-img-scale wow fadeInUp" data-rating="5" data-wow-duration="0.7s"
                                data-wow-offset="0">
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


    <main>
        <div class="news-container" style="margin-top:5px;">
            <div class="tab-content news-content clearfix">
                <div class="tab-pane active load-post-body" id="news-stories">
                    <div id="movieContainer"
                        style="grid grid-template-columns:6; grid-template-rows:4;max-width:1798px; margin:auto;">

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        let page = 3;
        let currentNumber = 0;
        let lastNumber = 0;


        window.addEventListener('scroll', () => {
            const {
                scrollTop,
                scrollHeight,
                clientHeight
            } = document.documentElement;

            if (scrollTop + clientHeight >= scrollHeight) {
                async function getNewMovies() {
                    const response = await fetch(`http://127.0.0.1:8000/api/recentMovie?page=${page}`);
                    const movieParameter = await response.json();

                    const {
                        movies: {
                            data: newMovies
                        }
                    } = movieParameter;

                    newMovies.map(movie => {
                        const movieElement = document.createElement('div');
                        movieElement.classList.add('post', 'post-height', 'hover-img-scale', 'wow',
                            'fadeInUp');
                        movieElement.setAttribute('data-rating', '5');
                        movieElement.setAttribute('data-wow-duration', '0.7s');
                        movieElement.setAttribute('data-wow-offset', '0');

                        movieElement.innerHTML = `
                        <div class="post-wrapper">
                            <a class="image" onclick="UpdateHits('23626','visit')" href="#"><img
                                    src="${movie.productFile}"
                                    alt="${movie.productTitle}"
                                    style="width: 100%; height: 100%;" /></a>
                            <div class="block">
                                <div class="title">
                                    ${movie.productTitle}
                                </div>
                            </div>
                        </div>
                    `;
                        const movieContainer = document.getElementById('movieContainer');
                        movieContainer.appendChild(movieElement);

                    })
                    page++;

                }
                getNewMovies();
            }
        });
    </script>
@endsection
