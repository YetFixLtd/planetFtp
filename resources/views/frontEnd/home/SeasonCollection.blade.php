@extends('frontEnd.master')

@section('title')
    Tv Series Details
@endsection



@section('main-content')
    <div class="container">

        <div class="row">


            <div class="col-sm-12 m-auto">
                <img src="{{ '/' }}{{ $poster->tvSeriesFile }}" class="img-responsive" alt="Movie Poster"
                    style="height:auto">
            </div>

        </div>
        <div class="page-header">
            <h1>{{ $title->tvSeriesTitle }} </h1>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-nav">
                <ul class="nav nav-tabs">

                    {{-- {{ dd($sesons) }} --}}

                    @foreach ($sesons as $season)
                        <li role="presentation" id="act">
                            <a href="#one{{ $season->id }}" aria-controls="one{{ $season->id }}" role="tab"
                                data-toggle="tab" class="h4">{{ $season->seasonTitle }}
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    @php($active = 0)
                    @foreach ($episodes->groupBy('seasonId') as $key => $ep)
                        <div role="tabpanel" class="tab-pane fade in {{ $active == 0 ? 'active' : '' }}"
                            id="one{{ $key }}">
                            @foreach ($ep as $episode)
                                <table class="table table-striped">

                                    <tbody>
                                        <tr class="row ">
                                            <td class="col-sm-6">
                                                <h4 class="h4">{{ $episode->episodeTitle }}</h4>
                                            </td>
                                            <td class="col-sm-3">
                                                <a href="{{ $episode->episodeUrl }}" class="btn btn-primary"
                                                    style="display: block;">Download</a>
                                            </td>
                                            <td class="col-sm-3"> <a data-toggle="modal"
                                                    data-target="#videoModal{{ $episode->id }}" class="btn btn-danger "
                                                    style="display: block;">Play</a>

                                            </td>

                                        </tr>

                                        <div class="modal fade" id="videoModal{{ $episode->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">

                                                <div class="modal-content">
                                                    <div class="modal-header">

                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="embed-responsive embed-responsive-16by9">
                                                            <video id="videoPlayer" class="embed-responsive-item" controls>
                                                                <source src="{{ $episode->episodeUrl }}" type="video/mp4">
                                                            </video>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </tbody>
                                </table>
                            @endforeach
                        </div>
                        @php($active++)
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('load', function() {
            const activeElement = document.getElementById('act');
            activeElement.classList.add('active');
        });
    </script>
@endsection
