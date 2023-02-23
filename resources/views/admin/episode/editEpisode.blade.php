@extends('admin.master')

@section('title')
    Edit episode
@endsection

@section('mainContent')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit episode</h6>
            </div>
            <div class="card-body">


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
{{--                <div class="card">--}}
{{--                    <div class="card-header text-center">{{ __('Edit episode') }}</div>--}}
                    <div class="card-body">
                        {!! Form::open(['route'=>'/episodeUpdate','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'name'=>'editepisodeForm' ])!!}
                        
                        <div class="form-group row">
                            <label for="inputpassword3" class="col-md-4 col-form-label text-md-right">TV Series Title </label>
                            <div class="col-md-8">
                                <select class="form-control" name="tvSeriesId">
                                    <option>Select TV Series</option>
                                    @foreach($tvSeries as $tvSeriess)
                                        <option value="{{$tvSeriess->id}}">{{$tvSeriess->tvSeriesTitle}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputpassword3" class="col-md-4 col-form-label text-md-right">Season Title </label>
                            <div class="col-md-8">
                            <select class="form-control" name="seasonId">
                                    <option>Select Season</option>
                                    @foreach($season as $seasons)
                                        <option value="{{$seasons->id}}">{{$seasons->seasonTitle}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">episode Title</label>
                            <div class="col-md-8">
                                <input type="text" value="{{$episode->episodeTitle}}" class="form-control" name="episodeTitle">
                                <input type="hidden" value="{{$episode->id}}" class="form-control" name="id">
                                <span class="text-danger">{{$errors->has('episodeTitle') ? $errors->first('episodeTitle') : ''}}</span>
                            </div>
                        </div>
                       
                       
                        <div class="form-group row">
                            <label for="inputpassword3" class="col-md-4 col-form-label text-md-right">episode Description </label>
                            <div class="col-md-8">
                                <textarea class="form-control textarea" name="episodeDescription" rows="5">{{$episode->episodeDescription}}</textarea>
                                <span class="text-danger">{{$errors->has('episodeDescription') ? $errors->first('episodeDescription') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">episode File</label>
                            <div class="col-md-8">
                                <input type="file" name="episodeFile" accept="episodeFile/*">
                                <img src="{{asset($episode->episodeFile)}}" alt="" height="150" width="150">
                                <span class="text-danger">{{$errors->has('episodeFile') ? $errors->first('episodeFile') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">episode Url</label>
                            <div class="col-md-8">
                                <input type="text" value="{{$episode->episodeUrl}}" class="form-control" name="episodeUrl">
                                <input type="hidden" value="{{$episode->id}}" class="form-control" name="id">
                                <span class="text-danger">{{$errors->has('episodeUrl') ? $errors->first('episodeUrl') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Rating</label>
                            <div class="col-md-8">
                                <input type="text" value="{{$episode->rating}}" class="form-control" name="rating">
                                <input type="hidden" value="{{$episode->id}}" class="form-control" name="id">
                                <span class="text-danger">{{$errors->has('rating') ? $errors->first('rating') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Year</label>
                            <div class="col-md-8">
                                <input type="text" value="{{$episode->year}}" class="form-control" name="year">
                                <input type="hidden" value="{{$episode->id}}" class="form-control" name="id">
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
                                <button type="submit" name="btn" class="btn btn-success btn-block">Update episode Info</button>
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
    document.forms['editepisodeForm'].elements['publicationStatus'].value={{$episode->publicationStatus}}
    document.forms['editepisodeForm'].elements['categoryId'].value={{$episode->categoryId}}
    document.forms['editepisodeForm'].elements['SubCategoryId'].value={{$episode->SubCategoryId}}
</script>

@endsection
