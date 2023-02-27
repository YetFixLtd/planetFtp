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
                            
                            $tvSeries = DB::table('tv_series')
                                ->select('tv_series.*')
                                ->orderBy('tv_series.id', 'DESC')
                                ->limit(10)
                                ->get();
                        @endphp



                        @forelse($products as $product)
                            <div class="post post-height hover-img-scale wow fadeInUp" data-rating="5" data-wow-duration="0.7s"
                                data-wow-offset="0">

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

                    </div>

                    <div style="margin-bottom:50px;">
                        <h1 class="text-center h1" style="letter-spacing: 1.5px;font-weight:bold;">
                            @php
                                if (count($tvSeries) > 0) {
                                    echo 'Recent Tv Series';
                                }
                            @endphp</h1>
                    </div>

                    <div class="content news-gallery">

                        @foreach ($tvSeries as $tv)
                            <div class="post post-height hover-img-scale wow fadeInDown" data-rating="5"
                                data-wow-duration="0.7s" data-wow-offset="0">
                                <div class="post-wrapper">
                                    <a class="image" href="{{ url('subCatTvSeason', ['id' => $tv->id]) }}"><img
                                            src="{{ asset($tv->tvSeriesFile) }}" alt="Rifle Ganj"
                                            style="width: 300px; height: 450px; margin: auto;" /></a>
                                    <div class="block">

                                        <div class="title">{{ $tv->tvSeriesTitle }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>



                </div>
            </div>




    </main>
@endsection
