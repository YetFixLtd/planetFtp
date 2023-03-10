@extends('admin.master')

@section('title')
    Edit Fttp
@endsection

@section('mainContent')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Fttp</h6>
            </div>
            <div class="card-body">


                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            {{--                <div class="card"> --}}
                            {{--                    <div class="card-header text-center">{{ __('Edit Category') }}</div> --}}
                            <div class="card-body">
                                {!! Form::open([
                                    'route' => '/catUpdate',
                                    'method' => 'POST',
                                    'class' => 'form-horizontal',
                                    'name' => 'editCategoryForm',
                                ]) !!}
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Fttp
                                        Title</label>
                                    <div class="col-md-8">
                                        <input type="text" value="{{ $categoryById->categoryTitle }}"
                                            class="form-control" name="categoryTitle">
                                        <input type="hidden" value="{{ $categoryById->id }}" class="form-control"
                                            name="id">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Fttp
                                        Title</label>
                                    <div class="col-md-8">
                                        <input type="text" value="{{ $categoryById->categoryTitle }}"
                                            class="form-control" name="categoryTitle">
                                        <input type="hidden" value="{{ $categoryById->id }}" class="form-control"
                                            name="id">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputpassword3" class="col-md-4 col-form-label text-md-right">Publication
                                        Status </label>
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
                                        <button type="submit" name="btn" class="btn btn-success btn-block">Update
                                            Category Info</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                            {{--                </div> --}}
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <script>
        document.forms['editCategoryForm'].elements['publicationStatus'].value = {{ $categoryById->publicationStatus }}
    </script>
@endsection
