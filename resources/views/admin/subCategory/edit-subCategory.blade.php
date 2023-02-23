@extends('admin.master')

@section('title')
    Edit Sub Category
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
                    <div class="card-body">
                        {!! Form::open(['route'=>'/SubCatUpdate','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'name'=>'editSubCategoryForm' ])!!}
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
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Sub Category Title</label>
                            <div class="col-md-8">
                                <input type="text" value="{{$subCategory->subCategoryTitle}}" class="form-control" name="subCategoryTitle">
                                <input type="hidden" value="{{$subCategory->id}}" class="form-control" name="id">
                                <span class="text-danger">{{$errors->has('subCategoryTitle') ? $errors->first('subCategoryTitle') : ''}}</span>
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
                                <button type="submit" name="btn" class="btn btn-success btn-block">Update Sub Category Info</button>
                            </div>
                        </div>
                        {!! Form::close()!!}
                    </div>
            </div>
        </div>
    </div>
            </div></div></div>


    <script src="{{asset('admin/')}}/tinymce/js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({selector: '.textarea'});</script>

<script>
    document.forms['editSubCategoryForm'].elements['publicationStatus'].value={{$subCategory->publicationStatus}}
    document.forms['editSubCategoryForm'].elements['categoryId'].value={{$subCategory->categoryId}}
</script>

@endsection
