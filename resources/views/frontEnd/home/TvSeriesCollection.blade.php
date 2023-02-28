@extends('frontEnd.master')

@section('title', 'Tv Series Details')

@section('main-content')
    <main>

        <div class="news-container" style="margin-right:45px;">
            <div style="margin-top:75px; text-align:center;">
                <h1 class="h1 lead" style="font-weight:bold; letter-spacing:1.2px;">
                    {{ $TvSeroesCategory->subCategoryTitle }}
                </h1>
                <h4 style="letter-spacing: 1.2px;font-weight:600">@php
                    if (count($children) === 0) {
                        echo ' Thre is no Series Available';
                    }
                @endphp</h4>
            </div>
            <hr />
            <div class="tab-content news-content clearfix">
                <div class="tab-pane active load-post-body" id="news-stories">
                    <div class="content news-gallery">

                        @foreach ($children as $child)
                            <div class="post post-height hover-img-scale wow fadeInUp" data-rating="5"
                                data-publish-date="18.04.2021" data-wow-duration="0.7s" data-wow-offset="0">
                                <div class="post-wrapper">
                                    <a class="image" href="{{ url('subCatTvSeason', ['id' => $child->id]) }}"><img
                                            src="{{ '/' }}{{ $child->tvSeriesFile }}" alt="Rifle Ganj"
                                            style="width: 100%; height: 100%;" /></a>
                                    <div class="block">

                                        <div class="title">{{ $child->tvSeriesTitle }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="h3 lead">
                {{ $children->links() }}
            </div>
        </div>
    </main>
@endsection
