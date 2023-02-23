@extends('admin.master')

@section('title')
    Manage Sub Category
@endsection

@section('mainContent')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sub Categories</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Sub Category Name</th>
                            <th>Sub Category Link</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Sub Category Name</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>

                            @foreach($subCategories as $subCategory)
                            <tr>
                                <td>{{$subCategory->id}}</td>
                                <td>{{$subCategory->categoryTitle}}</td>
                                <td>{{$subCategory->subCategoryTitle}}</td>
                                
                               
                                <td>{{$subCategory->publicationStatus == 1 ? 'Published' : 'Unpublished'}}</td>
                                <td>

                                    @if($subCategory->publicationStatus==1)
                                    <a href="{{route('/unpublished-SubCategory',['id' => $subCategory->id])}}" class="btn btn-success btn-circle">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    @else
                                    <a href="{{route('/published-SubCategory',['id' => $subCategory->id])}}" class="btn btn-warning btn-circle">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </a>
                                    @endif
                                    <a href="{{route('/subCatEdit',['id' => $subCategory->id])}}" class="btn btn-info btn-circle">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <a href="{{route('/SubCatDelete',['id' => $subCategory->id])}}" class="btn btn-danger btn-circle" onclick="return confirm('Are you sure to delete this');">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
