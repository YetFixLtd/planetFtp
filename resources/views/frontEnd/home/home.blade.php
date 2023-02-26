@extends('frontEnd.master')

@section('title')
    Home
@endsection

@section('main-content')
    <main>
        @include('frontEnd.includes.slider')

        <div class="news-container">
            <hr />
            <div class="tab-content news-content clearfix">
                <div class="tab-pane active load-post-body" id="news-stories">
                    <div class="content news-gallery">

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
                                            style="width: 300px; height: 450px; margin: auto;" /></a>
                                    <div class="block">

                                        <div class="title">{{ $product->productTitle }}</div>
                                    </div>
                                </div>
                            </div>

                        @empty
                        @endforelse

                        </>
                    </div>
                </div>
            </div>
    </main>
@endsection
