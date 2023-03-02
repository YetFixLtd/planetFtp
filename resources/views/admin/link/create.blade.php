@extends('admin.master')

@section('title')
    Add Link
@endsection

@section('mainContent')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Link</h6>
            </div>
            <div class="card-body">

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">

                            <h3 class="text-center text-success">{{ Session::get('message') }} </h3>

                            <div class="card-body">
                                {!! Form::open([
                                    'route' => 'link.store',
                                    'method' => 'POST',
                                    'class' => 'form-horizontal',
                                    'enctype' => 'multipart/form-data',
                                ]) !!}

                                <div class="form-group row">
                                    <label for="type" class="col-md-4 col-form-label text-md-right">Type</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="type">
                                            <option value="">Select type</option>
                                            <option value="LiveTv">Live TV</option>
                                            <option value="Index">Index</option>
                                        </select>
                                        <span
                                            class="text-danger">{{ $errors->has('type') ? $errors->first('type') : '' }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="url" class="col-md-4 col-form-label text-md-right">URL</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="url" placeholder="http://bciptv.net/">
                                        <span
                                            class="text-danger">{{ $errors->has('url') ? $errors->first('url') : '' }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="status" class="col-md-4 col-form-label text-md-right">Status </label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="status">
                                            <option value="">Select Status</option>
                                            <option value="publish">Publish</option>
                                            <option value="unPublish">Unpublish</option>
                                        </select>
                                        <span
                                            class="text-danger">{{ $errors->has('status') ? $errors->first('status') : '' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" name="btn" class="btn btn-success btn-block">Save Link Info</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('admin/') }}/tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '.textarea'
        });
    </script>
@endsection
