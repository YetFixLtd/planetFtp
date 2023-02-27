<!--  sidebar-opened -->
@extends('frontEnd.master')

@section('title')
    Others
@endsection

@section('main-content')
    <main>

        <div class="news-container">

            <hr />
            <div class="tab-content news-content clearfix">
                <div class="tab-pane active load-post-body" id="news-stories">
                    <div class="content news-gallery">
                        <div class="date-bar"></div>
                        @foreach ($productsData as $products)
                            <div class="post post-height hover-img-scale wow fadeInUp" data-rating="5" data-wow-duration="0.7s"
                                data-wow-offset="0">
                                <div class="post-wrapper">
                                    <a class="image" onclick="UpdateHits('23626','visit')" href="#"><img
                                            src=" {{ asset($products->productFile) }}" alt="Rifle Ganj"
                                            style="width: 100%; height: 100%;" /></a>
                                    <a href="{{ $products->productUrl }}" class="block text-center"
                                        style="background:#155e75; color:white; letter-spacing:1.2px; font-size:20px;">
                                        Download
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
