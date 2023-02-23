@extends('admin.master')

@section('title')
    Add Sub Category
@endsection

@section('mainContent')

    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Sub-Category</h6>
            </div>
            <div class="card-body">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
{{--                <div class="card">--}}
{{--                    <div class="card-header text-center">{{ __('Add Product') }}</div>--}}

                    <h3 class="text-center text-success">{{Session::get('message')}} </h3>
                    {{--                <hr>--}}

                    <div class="card-body">
                        {!! Form::open(['route'=>'/subCatSave','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])!!}

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Select Category</label>
                            <div class="col-md-8">
                                <select class="form-control" name="categoryId">
                                    <option>Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->categoryTitle}}</option>
                                    @endforeach
                                </select>
                                <span
                                class="text-danger">{{$errors->has('categoryId') ? $errors->first('categoryId') : ''}}</span>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Sub Category Title</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="subCategoryTitle">
                                <span class="text-danger">{{$errors->has('subCategoryTitle') ? $errors->first('subCategoryTitle') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">TV Series ?</label>
                            <div class="col-md-8">
                                <input type="checkbox" class="form-control" name="type" value="tv_series">
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
                                <span
                                class="text-danger">{{$errors->has('publicationStatus') ? $errors->first('publicationStatus') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="col-md-8 offset-md-4">
{{--                            <div class="col-sm-offset-2 col-sm-10">--}}
                                <button type="submit" name="btn" class="btn btn-success btn-block">Save Product Info</button>
                            </div>
                        </div>

                        {!! Form::close()!!}
                    </div>
{{--                </div>--}}
            </div>
        </div>
    </div>
            </div></div></div>


    <script src="{{asset('admin/')}}/tinymce/js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({selector: '.textarea'});</script>

@endsection
