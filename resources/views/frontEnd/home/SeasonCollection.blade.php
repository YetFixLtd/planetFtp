@extends('frontEnd.master')

@section('title', 'Tv Serial Season')

@section('main-content')
    <style>
        .playAndDownload {
            background: green;
            color: #fff;
            padding: 5px;
            display: block;
            text-align: center;
            border-radius: 5px;
        }
    </style>

    <section class="container">


        @foreach ($poster as $poster)
            <div class="poster">
                <img src="{{ '/' }}{{ $poster->tvSeriesFile }}" alt="Poster Image" class="img-fluid" width="100%"
                    height="650px">
            </div>
        @endforeach


        <ul class="nav nav-tabs " role="tablist">

            @foreach ($sesons as $season)
                <li class="active">
                    <a href="#home {{ $season->tvSeriesId }}" role="tab" data-toggle="tab">
                        <icon class="fa fa-home"></icon> {{ $season->seasonTitle }}
                    </a>
                </li>
            @endforeach
        </ul>


        <div class="tab-content">
            @foreach ($episodes as $episode)
                <div class="tab-pane fade active in" id="home{{ $episode->tvSeriesId }}">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h3 class="h4 lead">{{ $episode->episodeTitle }}</h3>
                                </td>
                                <td><a href="{{ $episode->episodeUrl }}" class="playAndDownload lead ">Download </a></td>
                                <td><a href="#" onclick="playVideo()" data-toggle="modal"
                                        data-target="#videoModal{{ $episode->id }}"class="playAndDownload lead "
                                        style="background:red;">Play
                                    </a></td>
                            </tr>

                            <div class="modal fade" id="videoModal{{ $episode->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="videoModalLabel" aria-hidden="true">
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
                </div>
            @endforeach

        </div>





    </section>

    <script>
        function playVideo() {
            var videoPlayer = document.getElementById("videoPlayer");
            videoPlayer.play();
        }
    </script>




@endsection
