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
                <img src="{{ '/' }}{{ $poster->tvSeriesFile }}" alt="Poster Image" class="img-fluid" width="100%">
            </div>
        @endforeach


        <!-- Nav tabs -->
        <ul class="nav nav-tabs " role="tablist">

            @foreach ($children as $child)
                <li class="active">
                    <a href="#home" role="tab" data-toggle="tab">
                        <icon class="fa fa-home"></icon> {{ $child->seasonTitle }}
                    </a>
                </li>
            @endforeach
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane fade active in" id="home">
                <table class="table">
                    <tbody>
                        @foreach ($episodes as $episode)
                            <tr>
                                <td>
                                    <h3 class="h4 lead">{{ $episode->episodeTitle }}</h3>
                                </td>
                                <td><a href="#" class="playAndDownload lead ">Download 2</a></td>
                                <td><a href="#" onclick="playVideo()" data-toggle="modal"
                                        data-target="#videoModal"class="playAndDownload lead " style="background:red;">Play
                                        2</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>


        <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="embed-responsive embed-responsive-16by9">
                            <video id="videoPlayer" class="embed-responsive-item" controls>
                                <source src="YOUR_VIDEO_URL" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>

    <script>
        function playVideo() {
            var videoPlayer = document.getElementById("videoPlayer");
            videoPlayer.play();
        }
    </script>




@endsection
