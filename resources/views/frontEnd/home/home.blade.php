@extends('frontEnd.master')

@section('title')
    Home
@endsection

@section('main-content')
    <main>
        @include('frontEnd.includes.slider')

        <div class="news-container">
            <div style="margin-bottom:10px;">
                <h1 class="text-center h1" style="letter-spacing: 0.1em;font-weight:600;">Recent Movies</h1>
            </div>
            <hr />
            <div class="tab-content news-content clearfix">
                <div class="tab-pane active load-post-body" id="news-stories">
                    <div class="content news-gallery">
                        @php
                            $products = DB::table('products')
                                ->select('products.*')
                                ->orderBy('products.id', 'DESC')
                                ->where('categoryId', 1)
                                ->paginate(54);
                            
                            $tvSeries = DB::table('tv_series')
                                ->select('tv_series.*')
                                ->orderBy('tv_series.id', 'DESC')
                                ->limit(54)
                                ->get();
                        @endphp

                        @forelse($products as $product)
                            <div class="post post-height hover-img-scale wow fadeInUp" data-rating="5" data-wow-duration="1s"
                                data-wow-offset="0" id="movieContainer">

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

                    <div style="margin-bottom:40px;">
                        <h1 class="text-center h1" style="letter-spacing: 0.1em;font-weight:bold; margin-top:10px;">
                            @php
                                if (count($tvSeries) > 0) {
                                    echo 'Recent Tv Series';
                                }
                            @endphp</h1>
                    </div>

                    <div class="content news-gallery">

                        @foreach ($tvSeries as $tv)
                            <div class="post post-height hover-img-scale wow fadeInDown" data-rating="5"
                                data-wow-duration="1s" data-wow-offset="0">
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

                    {{-- <div style="margin-bottom:50px;">
                        <h1 class="text-center h1" style="letter-spacing: 1.5px;font-weight:bold;">Recent Games</h1>
                    </div>
                    <hr/>

                    <div class="content news-gallery">
                        @php
                            $games = DB::table('products')
                                ->select('products.*')
                                ->orderBy('products.id', 'DESC')
                                ->where('categoryId', 2)
                                ->paginate(12);
                        @endphp

                        @forelse($games as $product)
                            <div class="post post-height hover-img-scale wow fadeInUp" data-rating="5"
                                data-wow-duration="0.7s" data-wow-offset="0">

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

                    </div> --}}


                    {{-- <div style="margin-bottom:50px;">
                        <h1 class="text-center h1" style="letter-spacing: 1.5px;font-weight:bold;">Recent Softwares</h1>
                    </div>
                    <hr/>

                    <div class="content news-gallery">
                        @php
                            $softwares = DB::table('products')
                                ->select('products.*')
                                ->orderBy('products.id', 'DESC')
                                ->where('categoryId', 3)
                                ->paginate(12);
                        @endphp

                        @forelse($softwares as $product)
                            <div class="post post-height hover-img-scale wow fadeInUp" data-rating="5"
                                data-wow-duration="0.7s" data-wow-offset="0">

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

                    </div> --}}


                </div>
            </div>




    </main>
    <script>
        let moviesCollection = [];
        let tvSeriesCollection = [];

        async function getMovieAndTvSeries() {
            const sources =
                `http://127.0.0.1:8000/api/recentMoviesAndTvSeries`;

            const response = await fetch(sources);
            const data = await response.json();
            const {
                movies,
                tvSeries
            } = data;
            console.log(movies);
            // const movieContainer = document.getElementById('movieContainer');
            // movieContainer.innerHTML = `${movies.map(movie =>
        //     <div class="post post-height hover-img-scale wow fadeInUp" data-rating="5"
        //         data-wow-duration="0.7s" data-wow-offset="0">
        //         <div class="post-wrapper">
        //             <a class="image" href="{{ url('/movie/' . $product->id) }}"><img
        //                     src="{{ asset($product->productFile) }}" alt="Rifle Ganj"
        //                     style="width: 300px; height: 450px; margin: auto;" /></a>
        //             <div class="block">

        //                 <div class="title">${movie.productTitle}</div>
        //             </div>
        //         </div>
        //     </div>
        // ).join('')}`;

        }
        getMovieAndTvSeries();
    </script>
@endsection
