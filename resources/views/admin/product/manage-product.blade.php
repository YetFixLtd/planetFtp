@extends('admin.master')

@section('title')
    Manage Item
@endsection

@section('mainContent')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Items</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>File</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>File</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($products as $product)
                                {{-- {{ dd($product) }} --}}
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->categoryTitle }}</td>
                                    <td>{{ $product->subCategoryTitle }}</td>
                                    <td>{{ $product->productTitle }}</td>
                                    <td><img src="{{ asset($product->productFile) }}" alt="{{ $product->id }}"
                                            height="100" width="100"></td>
                                    <td>{{ $product->productDescription }}</td>
                                    <th>
                                        <video width="320" height="240" controls>
                                            <source src="{{ $product->productUrl }}" type="video/mp4">
                                        </video>
                                    </th>
                                    {{-- <th>
                            <iframe width="727" height="409" src="{{ $product->productUrl }}" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                            </iframe>
                        </th> --}}
                                    <td>{{ $product->publicationStatus == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td>

                                        @if ($product->publicationStatus == 1)
                                            <a href="{{ route('/unpublished-product', ['id' => $product->id]) }}"
                                                class="btn btn-success btn-circle">
                                                <i class="fas fa-check"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('/published-product', ['id' => $product->id]) }}"
                                                class="btn btn-warning btn-circle">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('/productEdit', ['id' => $product->id]) }}"
                                            class="btn btn-info btn-circle">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        <a href="{{ route('/productDelete', ['id' => $product->id]) }}"
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
