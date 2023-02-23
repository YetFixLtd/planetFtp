@extends('admin.master')

@section('title')
    Add TV Series
@endsection

@section('mainContent')

    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add TV Series</h6>
            </div>
            <div class="card-body">



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
{{--                <div class="card">--}}
{{--                    <div class="card-header text-center">{{ __('Add TV Series') }}</div>--}}

                    <h3 class="text-center text-success">{{Session::get('message')}} </h3>
                    {{--                <hr>--}}

                    <div class="card-body">
                        {!! Form::open(['route'=>'/tvSeriesSave','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])!!}

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Sub Category</label>
                            <div class="col-md-8">
                                <select class="form-control" name="SubCategoryId">
                                    <option value="">Sub Category</option>
                                    @foreach($subCategories as $subCategory)
                                        <option value="{{$subCategory->id}}">{{$subCategory->subCategoryTitle}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('SubCategoryId') ? $errors->first('SubCategoryId') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">TV Series Title</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="tvSeriesTitle">
                                <span class="text-danger">{{$errors->has('tvSeriesTitle') ? $errors->first('tvSeriesTitle') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Image</label>
                            <div class="col-md-8">
                                <input type="file" name="tvSeriesFile" accept="tvSeriesFile/*">
                                <span class="text-danger">{{$errors->has('tvSeriesFile') ? $errors->first('tvSeriesFile') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputpassword3" class="col-md-4 col-form-label text-md-right">Publication Status </label>
                            <div class="col-md-8">
                                <select class="form-control" name="publicationStatus">
                                    <option value="">Select Publication Status</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                                <span class="text-danger">{{$errors->has('publicationStatus') ? $errors->first('publicationStatus') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="col-md-8 offset-md-4">
                                <button type="submit" name="btn" class="btn btn-success btn-block">Save TV Series Info</button>
                            </div>
                        </div>

                        {!! Form::close()!!}
                    </div>
{{--                </div>--}}
            </div>
        </div>
    </div>




            </div></div></div>

@endsection
