@extends('frontEnd.master')

@section('title', 'Tv Series Details')

@section('main-content')
    <main>
        <div class="news-container">
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
        </div>
    </main>
@endsection
