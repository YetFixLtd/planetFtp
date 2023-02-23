@extends('admin.master')

@section('title')
    Edit Product
@endsection

@section('mainContent')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Product</h6>
            </div>
            <div class="card-body">


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
{{--                <div class="card">--}}
{{--                    <div class="card-header text-center">{{ __('Edit Product') }}</div>--}}
                    <div class="card-body">
                        {!! Form::open(['route'=>'/productUpdate','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'name'=>'editProductForm' ])!!}
                        
                        <div class="form-group row">
                            <label for="inputpassword3" class="col-md-4 col-form-label text-md-right">Category Title </label>
                            <div class="col-md-8">
                                <select class="form-control" name="categoryId">
                                    <option>Select Category Name</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->categoryTitle}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputpassword3" class="col-md-4 col-form-label text-md-right">Sub Category Title </label>
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
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Product Title</label>
                            <div class="col-md-8">
                                <input type="text" value="{{$product->productTitle}}" class="form-control" name="productTitle">
                                <input type="hidden" value="{{$product->id}}" class="form-control" name="id">
                                <span class="text-danger">{{$errors->has('productTitle') ? $errors->first('productTitle') : ''}}</span>
                            </div>
                        </div>
                       
                       
                        <div class="form-group row">
                            <label for="inputpassword3" class="col-md-4 col-form-label text-md-right">Product Description </label>
                            <div class="col-md-8">
                                <textarea class="form-control textarea" name="productDescription" rows="5">{{$product->productDescription}}</textarea>
                                <span class="text-danger">{{$errors->has('productDescription') ? $errors->first('productDescription') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Product File</label>
                            <div class="col-md-8">
                                <input type="file" name="productFile" accept="productFile/*">
                                <img src="{{asset($product->productFile)}}" alt="" height="150" width="150">
                                <span class="text-danger">{{$errors->has('productFile') ? $errors->first('productFile') : ''}}</span>
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
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Rating</label>
                            <div class="col-md-8">
                                <input type="text" value="{{$product->rating}}" class="form-control" name="rating">
                                <input type="hidden" value="{{$product->id}}" class="form-control" name="id">
                                <span class="text-danger">{{$errors->has('rating') ? $errors->first('rating') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Year</label>
                            <div class="col-md-8">
                                <input type="text" value="{{$product->year}}" class="form-control" name="year">
                                <input type="hidden" value="{{$product->id}}" class="form-control" name="id">
                                <span class="text-danger">{{$errors->has('year') ? $errors->first('year') : ''}}</span>
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
                                <button type="submit" name="btn" class="btn btn-success btn-block">Update Product Info</button>
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

<script>
    document.forms['editProductForm'].elements['publicationStatus'].value={{$product->publicationStatus}}
    document.forms['editProductForm'].elements['categoryId'].value={{$product->categoryId}}
    document.forms['editProductForm'].elements['SubCategoryId'].value={{$product->SubCategoryId}}
</script>

@endsection
