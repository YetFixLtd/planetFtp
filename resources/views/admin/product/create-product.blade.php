@extends('admin.master')

@section('title')
    Add Item
@endsection

@section('mainContent')

    <div class="container-fluid" id="vue_app">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Item</h6>
            </div>
            <div class="card-body">

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            {{-- <div class="card"> --}}
                            {{-- <div class="card-header text-center">{{ __('Add Product') }}</div> --}}

                            <h3 class="text-center text-success">{{ Session::get('message') }} </h3>
                            {{-- <hr> --}}

                            <div class="card-body">
                                {!! Form::open(['route' => '/productSave', 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Select
                                        Category</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="categoryId" v-model="category_id" @change="fetch_sub_categories()">
                                            @change="fetch_tv_series">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->categoryTitle }}</option>
                                            @endforeach
                                        </select>
                                        <span
                                        class="text-danger">{{$errors->has('categoryId') ? $errors->first('categoryId') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Select Sub
                                        Category</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="SubCategoryId">
                                            <option value="">Select Sub Category</option>
                                            <option :value="row.id" v-for="row in sub_categories" v-html="row.subCategoryTitle"
                                                style="max-width: 200px">
                                        </select>
                                        <span
                                        class="text-danger">{{$errors->has('SubCategoryId') ? $errors->first('SubCategoryId') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Title</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="productTitle">
                                        <span
                                            class="text-danger">{{ $errors->has('productTitle') ? $errors->first('productTitle') : '' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3"
                                        class="col-md-4 col-form-label text-md-right">Description</label>
                                    <div class="col-md-8">
                                        <textarea class="form-control textarea" name="productDescription"
                                            rows="8"></textarea>
                                        <span
                                            class="text-danger">{{ $errors->has('productDescription') ? $errors->first('productDescription') : '' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">File</label>
                                    <div class="col-md-8">
                                        <input type="file" name="productFile" accept="productFile/*">
                                        <span
                                            class="text-danger">{{ $errors->has('productFile') ? $errors->first('productFile') : '' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Url</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="productUrl">
                                        <span
                                            class="text-danger">{{ $errors->has('productUrl') ? $errors->first('productUrl') : '' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Rating</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="rating">
                                        <span
                                            class="text-danger">{{ $errors->has('rating') ? $errors->first('rating') : '' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Year</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="year">
                                        <span
                                            class="text-danger">{{ $errors->has('year') ? $errors->first('year') : '' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputpassword3" class="col-md-4 col-form-label text-md-right">Publication
                                        Status </label>
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
                                        {{-- <div class="col-sm-offset-2 col-sm-10"> --}}
                                        <button type="submit" name="btn" class="btn btn-success btn-block">Save Item
                                            Info</button>
                                    </div>
                                </div>

                                {!! Form::close() !!}
                            </div>
                            {{-- </div> --}}
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

@push('js')

    <script src="{{ asset('vue-js/vue/dist/vue.js') }}"></script>
    <script src="{{ asset('vue-js/axios/dist/axios.min.js') }}"></script>
    <script src="{{ asset('vue-js/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            var vue = new Vue({
                el: '#vue_app',
                data: {
                    config: {

                        get_sub_categories_by_category_id_url: "{{ url('fetch-sub-category-by-category-id') }}",

                    },

                    category_id: '',
                    sub_category_id: '',
                    sub_categories: [],
                },
                methods: {

                    fetch_sub_categories() {

                        var vm = this;

                        var slug = vm.category_id;
                        // alert(slug);
                        if (slug) {
                            axios.get(this.config.get_sub_categories_by_category_id_url + '/' + slug).then(
                                function(response) {

                                    vm.sub_categories = response.data;
                                    console.log(vm.sub_categories);

                                }).catch(function(error) {

                                toastr.error('Something went to wrong', {
                                    closeButton: true,
                                    progressBar: true,
                                });

                                return false;

                            });
                        }

                    }
                },

                updated() {
                    $('.bSelect').selectpicker('refresh');
                }

            });

            $('.bSelect').selectpicker({
                liveSearch: true,
                size: 5
            });
        });

    </script>
@endpush

