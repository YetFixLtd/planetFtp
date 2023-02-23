@extends('admin.master')

@section('title')
    Edit Season
@endsection

@section('mainContent')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Season</h6>
            </div>
            <div class="card-body">


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
{{--                <div class="card">--}}
{{--                    <div class="card-header text-center">{{ __('Edit Season') }}</div>--}}
                        <div class="card-body">
                            {!! Form::open(['route'=>'/seasonUpdate','method'=>'POST','class'=>'form-horizontal','name'=>'editSeasonForm'])!!}


                            <div class="form-group row">
                                        <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Select Sub Category</label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="tvSeriesId">
                                                <option>Select TV Series</option>
                                                @foreach($tvSeries as $tvSeriess)
                                                    <option value="{{$tvSeriess->id}}">{{$tvSeriess->tvSeriesTitle}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Season Title</label>
                                    <div class="col-md-8">
                                        <input type="text" value="{{$season->seasonTitle}}" class="form-control" name="seasonTitle">
                                        <input type="hidden" value="{{$season->id}}" class="form-control" name="id">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputpassword3" class="col-md-4 col-form-label text-md-right">Publication Status </label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="publicationStatus">
                                            <option>Select Publication Status</option>
                                            <option value="1">Published</option>
                                            <option value="0">Unpublished</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" name="btn" class="btn btn-success btn-block">Update Season Info</button>
                                    </div>
                                </div>
                        {!! Form::close()!!}
                    </div>
{{--                </div>--}}
            </div>
        </div>
    </div>


            </div></div></div>

    <script>
        document.forms['editSeasonForm'].elements['publicationStatus'].value={{$season->publicationStatus}}
    </script>

@endsection
