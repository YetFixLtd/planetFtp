@extends('admin.master')

@section('title')
    Add Fttp Partner
@endsection

@section('mainContent')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Fttp</h6>
            </div>
            <div class="card-body">



                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            {{--                <div class="card"> --}}
                            {{--                    <div class="card-header text-center">{{ __('Add Category') }}</div> --}}

                            <h3 class="text-center text-success">{{ Session::get('message') }} </h3>
                            {{--                <hr> --}}

                            <div class="card-body">
                                {!! Form::open(['route' => '/catSave', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Fttp
                                        Title</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name">
                                        <span
                                            class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Fttp
                                        Uri/Link</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="uri">
                                        <span
                                            class="text-danger">{{ $errors->has('uri') ? $errors->first('uri') : '' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputpassword3" class="col-md-4 col-form-label text-md-right">Publication
                                        Status
                                    </label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="publicationStatus">
                                            <option value="">Select Publication Status</option>
                                            <option value="1">Published</option>
                                            <option value="0">Unpublished</option>
                                        </select>
                                        <span
                                            class="text-danger">{{ $errors->has('publicationStatus') ? $errors->first('publicationStatus') : '' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" name="btn" class="btn btn-success btn-block">Save
                                            Fttp Partenr</button>
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
@endsection
