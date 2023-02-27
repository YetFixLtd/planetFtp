@extends('admin.master')

@section('title')
    Manage Category
@endsection

@section('mainContent')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>

                            @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->categoryTitle}}</td>
                                <td>{{$category->publicationStatus == 1 ? 'Published' : 'Unpublished'}}</td>
                                <td>
{{--                                    <a href="{{url('/catagory-items4/'.$category->id)}}" class="btn btn-success">--}}
{{--                                        <span class="glyphicon glyphicon-edit"></span>--}}
{{--                                    </a>--}}

                                    @if($category->publicationStatus==1)
                                    <a href="{{route('/unpublished-category',['id' => $category->id])}}" class="btn btn-success btn-circle">
                                        <i class="fas fa-check"></i>
                                    </a>
{{--                                        <a href="{{route('/unpublished-category',['id' => $category->id, 'a' => $category->categoryTitle])}}" class="btn btn-success btn-xs">--}}
{{--                                            <span class="glyphicon glyphicon-arrow-up"></span>--}}
{{--                                        </a>--}}
                                    @else
                                    <a href="{{route('/published-category',['id' => $category->id])}}" class="btn btn-warning btn-circle">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </a>
                                    @endif
                                    <a href="{{route('/catEdit',['id' => $category->id])}}" class="btn btn-info btn-circle">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
{{--                                    <a href="{{url('/catagory-items6/'.$category->id)}}" class="btn btn-danger btn-circle" onclick="return confirm('Are you sure to delete this');">--}}
{{--                                        <span class="glyphicon glyphicon-trash"></span>--}}
{{--                                        <i class="fas fa-trash"></i>--}}
{{--                                    </a>--}}
                                    {{-- <a href="{{route('/catDelete',['id' => $category->id])}}" class="btn btn-danger btn-circle" onclick="return confirm('Are you sure to delete this');">
                                        <i class="fas fa-trash"></i>
                                    </a> --}}
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
