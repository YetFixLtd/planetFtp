@extends('admin.master')

@section('title')
Edit Slider
@endsection

@section('mainContent')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Slider</h6>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card-body">
                            {!!Form::open(['route'=>'/sliderUpdate','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data','name'=>'editProductForm' ])!!}
                            
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Title</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="title" value="{{ $product->title }}">
                                    <span class="text-danger">{{$errors->has('title') ? $errors->first('title') : ''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Description</label>
                                <div class="col-md-8">
                                    <textarea class="form-control textarea" name="description" rows="8" >{{ $product->description }}</textarea>
                                    <span class="text-danger">{{$errors->has('description') ? $errors->first('description') : ''}}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Product File</label>
                                <div class="col-md-8">
                                    <input type="file" name="productFile" accept="productFile/*">
                                    <img src="{{asset($product->productFile)}}" alt="" height="150" width="150">
                                    <span
                                        class="text-danger">{{$errors->has('productFile') ? $errors->first('productFile') : ''}}</span>
                                </div>
                            </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Product Url</label>
                            <div class="col-md-8">
                                <input type="text" value="{{$product->productUrl}}" class="form-control" name="productUrl">
                                <input type="hidden" value="{{$product->id}}" class="form-control" name="id">
                                <span class="text-danger">{{$errors->has('productUrl') ? $errors->first('productUrl') : ''}}</span>
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
                                    <button type="submit" name="btn" class="btn btn-success btn-block">
                                        Update Product Info
                                    </button>
                                </div>
                            </div>
                            {!! Form::close()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('admin/')}}/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({selector: '.textarea'});
</script>

<script>
    document.forms['editProductForm'].elements['publicationStatus'].value={{$product->publicationStatus}}
</script>

@endsection