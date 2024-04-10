@extends('frontEnd.master')

@section('title')
    Home
@endsection



@section('main-content')
    
    <main>
        <h2 class="recent-movie-text"> Recent
            movies</h2>
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
@endsection
