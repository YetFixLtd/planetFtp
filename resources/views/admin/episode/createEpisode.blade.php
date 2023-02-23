@extends('admin.master')

@section('title')
Add Episode
@endsection

@section('mainContent')

<div class="container-fluid" id="vue_app">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Episode</h6>
        </div>
        <div class="card-body">



            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        {{-- <div class="card">--}}
                        {{-- <div class="card-header text-center">{{ __('Add Episode') }}
                    </div>--}}

                    <h3 class="text-center text-success">{{Session::get('message')}} </h3>
                    {{-- <hr>--}}


                    <div class="card-body">
                        {!! Form::open(['route'=>'/episodeSave','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])!!}

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Sub Category</label>
                            <div class="col-md-8">
                                <select class="form-control" name="SubCategoryId" v-model="sub_category_id" @change="fetch_tv_series">
                                    <option value="">Sub Category</option>
                                    @foreach($subCategories as $subCategory)
                                    <option value="{{$subCategory->id}}">{{$subCategory->subCategoryTitle}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('SubCategoryId') ? $errors->first('SubCategoryId') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">TV Series</label>
                            <div class="col-md-8">
                                <select name="tvSeriesId" id="tvSeriesId" class="form-control" v-model="tv_series_id" @change="fetch_seasons">
                                    <option value="">Select one</option>
                                    <option :value="row.id" v-for="row in tv_series" v-html="row.tvSeriesTitle" style="max-width: 200px">
                                    </option>
                                </select>
                                <span class="text-danger">{{$errors->has('tvSeriesId') ? $errors->first('tvSeriesId') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Season</label>
                            <div class="col-md-8">
                                <select name="seasonId" id="seasonId" class="form-control" v-model="season_id">
                                    <option value="">Select one</option>
                                    <option :value="row.id" v-for="row in seasons" v-html="row.seasonTitle" style="max-width: 200px">
                                    </option>

                                </select>
                                <span class="text-danger">{{$errors->has('seasonId') ? $errors->first('seasonId') : ''}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Episode Title</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="episodeTitle">
                                <span class="text-danger">{{$errors->has('episodeTitle') ? $errors->first('episodeTitle') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Description</label>
                            <div class="col-md-8">
                                <textarea class="form-control textarea" name="episodeDescription" rows="8"></textarea>
                                <span class="text-danger">{{$errors->has('episodeDescription') ? $errors->first('episodeDescription') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">File</label>
                            <div class="col-md-8">
                                <input type="file" name="episodeFile" accept="episodeFile/*">
                                <span class="text-danger">{{$errors->has('episodeFile') ? $errors->first('episodeFile') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Url</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="episodeUrl">
                                <span class="text-danger">{{$errors->has('episodeUrl') ? $errors->first('episodeUrl') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Rating</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="rating">
                                <span class="text-danger">{{$errors->has('rating') ? $errors->first('rating') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Year</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="year">
                                <span class="text-danger">{{$errors->has('year') ? $errors->first('year') : ''}}</span>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="inputpassword3" class="col-md-4 col-form-label text-md-right">Publication Status </label>
                            <div class="col-md-8">
                                <select class="form-control" name="publicationStatus">
                                    <option value="">Select Publication Status</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                                <span class="text-danger">{{$errors->has('publicationStatus') ? $errors->first('publicationStatus') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="col-md-8 offset-md-4">
                                <button type="submit" name="btn" class="btn btn-success btn-block">Save Episode Info</button>
                            </div>
                        </div>

                        {!! Form::close()!!}
                    </div>
                    {{-- </div>--}}
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
          get_seasons_by_tv_series_id_url: "{{ url('fetch-season-by-tv-series-id') }}",

        },


        sub_category_id: '',
        tv_series_id: '',
        season_id: '',
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
            axios.get(this.config.get_tv_series_by_sub_category_id_url + '/' + slug).then(function(response) {

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

        },
        fetch_seasons() {

          var vm = this;

          var slug = vm.tv_series_id;
        
          if (slug) {
            axios.get(this.config.get_seasons_by_tv_series_id_url + '/' + slug).then(function(response) {

              vm.seasons = response.data;
              console.log(vm.seasons);

            }).catch(function(error) {

              toastr.error('Something went to wrong', {
                closeButton: true,
                progressBar: true,
              });

              return false;

            });
          }

        },


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