@extends('frontEnd.master')

@section('title')
    Home
@endsection

@section('main-content')
    @include('frontEnd.includes.slider')
    <div class="news-container">

        <hr />
        <div class="tab-content news-content clearfix">
            <div class="tab-pane active load-post-body" id="news-stories">
                <div class="content news-gallery">
                    <div class="date-bar"></div>

                    @php
                        $products = DB::table('products')
                            ->select('products.*')
                            ->orderBy('products.id', 'DESC')
                            ->where('categoryId', 1)
                            ->paginate(8);
                    @endphp
                    @forelse($products as $product)
                        <div class="post post-height hover-img-scale wow fadeInUp" data-rating="5"
                            data-publish-date="18.04.2021" data-wow-duration="0.7s" data-wow-offset="0">
                            <div class="post-wrapper">
                                <a class="image" href="{{ url('/movie/' . $product->id) }}"><img
                                        src="{{ asset($product->productFile) }}" alt="Rifle Ganj"
                                        style="width: 100%; height: 100%;" /></a>
                                <div class="block">
                                    {{-- <div class="day-views">
                                        <span class="day">34 minutes ago</span>
                                        <span class="view">52 Hits</span>
                                    </div> --}}
                                    <div class="title">{{ $product->productTitle }}</div>
                                </div>
                            </div>
                        </div>

                    @empty
                    @endforelse

                </div>
                <div class="load-data">
                    <p>Loading...</p>
                </div>
            </div>
        </div>
    </div>
@endsection
