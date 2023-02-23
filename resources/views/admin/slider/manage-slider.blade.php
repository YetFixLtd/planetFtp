@extends('admin.master')

@section('title')
Manage Slider
@endsection

@section('mainContent')

<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sliders</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>File</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>File</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach($products as $product)
                        {{-- {{ dd($product) }} --}}
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->title}}</td>
                            <td>{{$product->description}}</td>
                            <th>
                                <img src="{{asset($product->productFile) }}" alt="{{$product->id}}" height="100"
                                    width="100">
                            </th>
                            <td>{{$product->publicationStatus == 1 ? 'Published' : 'Unpublished'}}</td>
                            <td>
                                <a href="{{route('/sliderEdit',['id' => $product->id])}}"
                                    class="btn btn-info btn-circle">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                                <a href="{{route('/sliderDelete',['id' => $product->id])}}"
                                    class="btn btn-danger btn-circle"
                                    onclick="return confirm('Are you sure to delete this');">
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