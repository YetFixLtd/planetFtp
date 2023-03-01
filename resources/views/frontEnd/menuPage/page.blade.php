@extends('frontEnd.master')

@section('title')
    Home
@endsection

@section('main-content')
    <main>
        {{-- @include('frontEnd.includes.slider') --}}

        <div class="news-container">
            <div style="margin-top:85px; letter-spacing:1.2px; text-align:center;font-weight:bold;">
                <h3 class="ml-10" style=" ">
                    {{ $sub_category->subCategoryTitle }}</h3>
                <h4 style="letter-spacing: 1.2px;font-weight:600">@php
                    if (count($children) === 0) {
                        echo ' Thre is no Movies Available';
                    }
                @endphp</h4>
            </div>
            <hr />


            <div class="tab-content news-content clearfix">
                <div class="tab-pane active load-post-body" id="news-stories">
                    <div class="content news-gallery">
                        {{-- <div class="date-bar"></div> --}}


                        @forelse($children as $product)
                            <div class="post post-height hover-img-scale wow fadeInUp" data-rating="5"
                                data-wow-duration="0.7s" data-wow-offset="0">
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
                <div class="lead text-primary " style="margin-left:50px;margin-top:8px;">
                    {{ $children->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </main>
@endsection
