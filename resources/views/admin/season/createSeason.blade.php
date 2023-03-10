@extends('admin.master')

@section('title')
    Add Season
@endsection

@section('mainContent')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Season</h6>
            </div>
            <div class="card-body">



                <div class="container" id="vue_app">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            {{-- <div class="card"> --}}
                            {{-- <div class="card-header text-center">{{ __('Add Season') }}
          </div> --}}

                            <h3 class="text-center text-success">{{ Session::get('message') }} </h3>
                            {{-- <hr> --}}

                            <div class="card-body">
                                {!! Form::open([
                                    'route' => '/seasonSave',
                                    'method' => 'POST',
                                    'class' => 'form-horizontal',
                                    'enctype' => 'multipart/form-data',
                                ]) !!}

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Sub
                                        Category</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="SubCategoryId" v-model="sub_category_id"
                                            @change="fetch_tv_series">
                                            <option value="">Sub Category</option>
                                            @foreach ($subCategories as $subCategory)
                                                <option value="{{ $subCategory->id }}">{{ $subCategory->subCategoryTitle }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span
                                            class="text-danger">{{ $errors->has('SubCategoryId') ? $errors->first('SubCategoryId') : '' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">TV Series</label>
                                    <div class="col-md-8">
                                        <select name="tvSeriesId" id="tv_series_id" class="form-control"
                                            onchange="getTvSeason()" v-model="tv_series_id">
                                            <option value="">Select one</option>
                                            <option :value="row.id" v-for="row in tv_series"
                                                v-html="row.tvSeriesTitle" style="max-width: 200px"
                                                :custom-attribute="row.tv_series_api_id">
                                            </option>
                                        </select>
                                        <span
                                            class="text-danger">{{ $errors->has('tvSeriesId') ? $errors->first('tvSeriesId') : '' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Season
                                        Title</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="seasonTitle" id="searchInput">
                                        <ul id="dropdown" class="list-group position-relative"
                                            style="list-style: none; z-index:10;"></ul>
                                        <span
                                            class="text-danger">{{ $errors->has('seasonTitle') ? $errors->first('seasonTitle') : '' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Season
                                        File</label>
                                    <div class="col-md-8">
                                        <img src="" alt="" id="image" class="img-thumbnail">
                                        <input type="hidden" name="imageUrl" value="" id="imageUrl">
                                        <input type="number" name="season_api_id" style="display: none;"
                                            id="season_api_id">
                                        <input type="file" name="seasonFile" accept="seasonFile/*" id="productFile">
                                        <span
                                            class="text-danger">{{ $errors->has('seasonFile') ? $errors->first('seasonFile') : '' }}</span>
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
                                        <button type="submit" name="btn" class="btn btn-success btn-block">Save Season
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

                        get_tv_series_by_sub_category_id_url: "{{ url('fetch-tv-series-by-sub-category-id') }}",

                    },


                    sub_category_id: '',
                    tv_series_id: '',
                    product_id: '',
                    tv_series: [],
                    seasons: [],
                    products: [],
                    items: [],
                    quantity: 0,
                    price: 0,
                    selling_price: 0,
                    carrying_cost: 0,

                },
                methods: {

                    fetch_tv_series() {

                        var vm = this;

                        var slug = vm.sub_category_id;
                        if (slug) {
                            axios.get(this.config.get_tv_series_by_sub_category_id_url + '/' + slug).then(
                                function(response) {

                                    vm.tv_series = response.data;
                                    console.log(vm.tv_series);

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


    <script>
        const apiKey = 'a7cf56b45650279486792f3f351721b5';


        async function getTvSeason() {
            const select = document.getElementById('tv_series_id');
            const dropDown = document.getElementById('dropdown');
            const imageUrlHidden = document.getElementById('imageUrl');
            const selectedOption = select.options[select.selectedIndex];
            const tv_id = selectedOption.getAttribute('custom-attribute');
            const tvSeasonApiId = document.getElementById('season_api_id');
            const title = document.getElementById('searchInput');
            const url = `https://api.themoviedb.org/3/tv/${tv_id}?api_key=${apiKey}&language=en-US`;
            const response = await fetch(url);
            const data = await response.json();
            const {
                seasons
            } = data;
            dropDown.innerHTML = '';
            console.log(seasons);

            seasons.map((season) => {
                const imageUrl =
                    `https://image.tmdb.org/t/p/w500/${ season.poster_path}`;
                const alt = season.name;
                const li = document.createElement('li');
                const image = document.createElement('img');
                image.src = imageUrl;
                image.alt = `${season.name}`;
                image.style.width = "80px";
                image.style.height = "80px";
                image.classList.add('position-absolute');
                li.classList.add('list-group-item');
                li.style.cursor = 'pointer';
                li.setAttribute('id', `${ season.id}`);
                li.innerHTML = `${ season.name}`;
                li.appendChild(image);

                li.onclick = function() {
                    const title = document.getElementById(`${season.id}`);
                    const searchInput = document.getElementById('searchInput');
                    const image = document.getElementById('image');
                    const productFile = document.getElementById('productFile');

                    searchInput.value = title.innerText;
                    tvSeasonApiId.value = season.id;

                    image.src =
                        `https://image.tmdb.org/t/p/w500/${season.poster_path }`;
                    imageUrlHidden.value = image.src;
                    dropDown.style.display = "none";
                    productFile.style.display = "none";

                }
                dropDown.appendChild(li);
            });
            searchInput.addEventListener("keyup", function() {
                dropDown.style.display = "none";
            });

        }
    </script>
@endpush
