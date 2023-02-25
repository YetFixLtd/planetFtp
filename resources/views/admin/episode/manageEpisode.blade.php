@extends('admin.master')

@section('title')
    Manage Episode
@endsection

@section('mainContent')

    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Episodes</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>TV Series Name</th>
                            <th>Seasons</th>
                            <th>Episode Title</th>
                            <th>Episode Description</th>
                            <th>File</th>
                            <th>Url</th>
                            <th>Rating</th>
                            <th>Year</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>TV Series Name</th>
                            <th>Seasons</th>
                            <th>Episode Title</th>
                            <th>Episode Description</th>
                            <th>File</th>
                            <th>Url</th>
                            <th>Rating</th>
                            <th>Year</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>

                            @foreach($episodes as $episode)
                            {{-- {{ dd($episode) }} --}}
                            <tr>
                                <td>{{$episode->id}}</td>
                                <td>{{$episode->tvSeriesTitle}}</td>
                                <td>{{$episode->seasonTitle}}</td>
                                <td>{{$episode->episodeTitle}}</td>
                                <td>{{$episode->episodeDescription}}</td>
                                <td>{{$episode->episodeFile}}</td>
                                <td>{{$episode->episodeUrl}}</td>
                                <td>{{$episode->rating}}</td>
                                <td>{{$episode->year}}</td>
                                {{-- <th><img src="{{asset($episode->episodeUrl) }}" alt="{{$episode->id}}" height="100" width="100"></th> --}}
                                <th>
                                    <video width="320" height="240" controls>
                                        <source src="{{ $episode->episodeUrl }}" type="video/mp4">
                                    </video>
                                </th>
                                {{-- <th>
                            <iframe width="727" height="409" src="{{ $episode->episodeUrl }}" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                            </iframe>
                        </th> --}}
                                <td>{{$episode->publicationStatus == 1 ? 'Published' : 'Unpublished'}}</td>
                                <td>

                                    @if($episode->publicationStatus==1)
                                    <a href="{{route('/unpublished-episode',['id' => $episode->id])}}" class="btn btn-success btn-circle">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    @else
                                    <a href="{{route('/published-episode',['id' => $episode->id])}}" class="btn btn-warning btn-circle">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </a>
                                    @endif
                                    <a href="{{route('/episodeEdit',['id' => $episode->id])}}" class="btn btn-info btn-circle">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <a href="{{route('/episodeDelete',['id' => $episode->id])}}" class="btn btn-danger btn-circle" onclick="return confirm('Are you sure to delete this');">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
