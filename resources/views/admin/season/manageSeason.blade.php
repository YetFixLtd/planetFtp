@extends('admin.master')

@section('title')
    Manage seasons
@endsection

@section('mainContent')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Seasons</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>TV Series Name</th>
                            <th>Season Title</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>TV Series Name</th>
                            <th>Season Title</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>

                            @foreach($season as $seasons)
                            <tr>
                                <td>{{$seasons->id}}</td>
                                <td>{{$seasons->tvSeriesTitle}}</td>
                                <td>{{$seasons->seasonTitle}}</td>
                                <td>{{$seasons->publicationStatus == 1 ? 'Published' : 'Unpublished'}}</td>
                                <td>
{{--                                    <a href="{{url('/catagory-items4/'.$seasons->id)}}" class="btn btn-success">--}}
{{--                                        <span class="glyphicon glyphicon-edit"></span>--}}
{{--                                    </a>--}}

                                    @if($seasons->publicationStatus==1)
                                    <a href="{{route('/unpublished-season',['id' => $seasons->id])}}" class="btn btn-success btn-circle">
                                        <i class="fas fa-check"></i>
                                    </a>
{{--                                        <a href="{{route('/unpublished-season',['id' => $seasons->id, 'a' => $seasons->seasonsTitle])}}" class="btn btn-success btn-xs">--}}
{{--                                            <span class="glyphicon glyphicon-arrow-up"></span>--}}
{{--                                        </a>--}}
                                    @else
                                    <a href="{{route('/published-season',['id' => $seasons->id])}}" class="btn btn-warning btn-circle">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </a>
                                    @endif
                                    <a href="{{route('/seasonEdit',['id' => $seasons->id])}}" class="btn btn-info btn-circle">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
{{--                                    <a href="{{url('/catagory-items6/'.$seasons->id)}}" class="btn btn-danger btn-circle" onclick="return confirm('Are you sure to delete this');">--}}
{{--                                        <span class="glyphicon glyphicon-trash"></span>--}}
{{--                                        <i class="fas fa-trash"></i>--}}
{{--                                    </a>--}}
                                    <a href="{{route('/seasonDelete',['id' => $seasons->id])}}" class="btn btn-danger btn-circle" onclick="return confirm('Are you sure to delete this');">
                                        {{--                                        <span class="glyphicon glyphicon-trash"></span>--}}
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
