@extends('admin.master')

@section('title')
        Edit TV Series
@endsection

@section('mainContent')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit TV Series</h6>
            </div>
            <div class="card-body">


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
{{--                <div class="card">--}}
{{--                    <div class="card-header text-center">{{ __('Edit TV Series') }}</div>--}}
                        <div class="card-body">
                            {!! Form::open(['route'=>'/tvSeriesUpdate','method'=>'POST','class'=>'form-horizontal','name'=>'editTvSeriesForm'])!!}

                                <div class="form-group row">
                                        <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Select Sub Category</label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="SubCategoryId">
                                                <option>Select Sub Category</option>
                                                @foreach($subCategories as $subCategory)
                                                    <option value="{{$subCategory->id}}">{{$subCategory->subCategoryTitle}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">TV Series Title</label>
                                    <div class="col-md-8">
                                        <input type="text" value="{{$tvSeries->tvSeriesTitle}}" class="form-control" name="tvSeriesTitle">
                                        <input type="hidden" value="{{$tvSeries->id}}" class="form-control" name="id">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">episode File</label>
                                        <div class="col-md-8">
                                            <input type="file" name="tvSeriesFile" accept="tvSeriesFile/*">
                                            <img src="{{asset($tvSeries->tvSeriesFile)}}" alt="" height="150" width="150">
                                            <span class="text-danger">{{$errors->has('tvSeriesFile') ? $errors->first('tvSeriesFile') : ''}}</span>
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
                                        <button type="submit" name="btn" class="btn btn-success btn-block">Update TV Series Info</button>
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
        document.forms['editTvSeriesForm'].elements['SubCategoryId'].value={{$tvSeries->SubCategoryId}}
        document.forms['editTvSeriesForm'].elements['publicationStatus'].value={{$tvSeries->publicationStatus}}
    </script>

@endsection
