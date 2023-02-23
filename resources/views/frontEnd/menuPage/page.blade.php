@extends('frontEnd.master')

@section('title')
    Home
@endsection

@section('main-content')
    <main>
        {{-- @include('frontEnd.includes.slider') --}}

        <div class="news-container">
            <h3 class="ml-10">{{ $sub_category->subCategoryTitle }}</h3>
            <hr />
            <div class="tab-content news-content clearfix">
                <div class="tab-pane active load-post-body" id="news-stories">
                    <div class="content news-gallery">
                        {{-- <div class="date-bar"></div> --}}


                        @forelse($children as $product)
                            <div class="post post-height hover-img-scale wow fadeInUp" data-rating="5"
                                data-publish-date="18.04.2021" data-wow-duration="0.7s" data-wow-offset="0">
                                <div class="post-wrapper">
                                    <a class="image" href="{{ url('/movie/' . $product->id) }}"><img
                                            src="{{ asset($product->productFile) }}" alt="Rifle Ganj"
                                            style="width: 100%; height: 100%;" /></a>
                                    <div class="block">

                                        <div class="title">{{ $product->productTitle }}</div>
                                    </div>
                                </div>
                            </div>

                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


