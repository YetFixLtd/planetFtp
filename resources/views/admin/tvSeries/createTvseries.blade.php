@extends('admin.master')

@section('title')
    Add TV Series
@endsection

@section('mainContent')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add TV Series</h6>
            </div>
            <div class="card-body">



                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            {{--                <div class="card"> --}}
                            {{--                    <div class="card-header text-center">{{ __('Add TV Series') }}</div> --}}

                            <h3 class="text-center text-success">{{ Session::get('message') }} </h3>
                            {{--                <hr> --}}

                            <div class="card-body">
                                {!! Form::open([
                                    'route' => '/tvSeriesSave',
                                    'method' => 'POST',
                                    'class' => 'form-horizontal',
                                    'enctype' => 'multipart/form-data',
                                ]) !!}

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Sub
                                        Category</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="SubCategoryId">
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
                                    <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">TV Series
                                        Title</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="tvSeriesTitle" id="searchInput"
                                            oninput="getTvSeriesData()">
                                        <ul id="dropdown" class="list-group position-relative"
                                            style="list-style: none; z-index:10;"></ul>
                                        <span
                                            class="text-danger">{{ $errors->has('tvSeriesTitle') ? $errors->first('tvSeriesTitle') : '' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-4 col-form-label text-md-right">Image</label>
                                    <div class="col-md-8">
                                        <img src="" alt="" id="image" class="img-thumbnail">
                                        <input type="hidden" name="imageUrl" value="" id="imageUrl">
                                        <input type="number" name="tv_series_id" style="display: none;" id="tv_series_id">
                                        <input type="file" name="tvSeriesFile" accept="tvSeriesFile/*" id="tvSeriesFile">
                                        <span
                                            class="text-danger">{{ $errors->has('tvSeriesFile') ? $errors->first('tvSeriesFile') : '' }}</span>
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
                                        <button type="submit" name="btn" class="btn btn-success btn-block">Save TV
                                            Series Info</button>
                                    </div>
                                </div>

                                {!! Form::close() !!}
                            </div>
                            {{--                </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    const apiKey = 'a7cf56b45650279486792f3f351721b5';
    let tvSeriesCollection = [];

    async function getTvSeriesData() {
        const dropDown = document.getElementById('dropdown');
        const searchInput = document.getElementById('searchInput');
        const tvSeriesApiId = document.getElementById('tv_series_id');
        const imageUrlHidden = document.getElementById('imageUrl');
        const query = searchInput.value;

        if (query.trim().length > 2) {
            dropDown.style.display = "block";
            const url = `https://api.themoviedb.org/3/search/tv?api_key=${apiKey}&query=${query}`;
            const response = await fetch(url);
            const data = await response.json();
            const {
                results
            } = data;
            console.log(results);
            tvSeriesCollection = results;

            dropDown.innerHTML = '';

            tvSeriesCollection.map((tvSeries) => {
                const imageUrl =
                    `https://image.tmdb.org/t/p/w500/${ tvSeries.poster_path}`;
                const alt = tvSeries.name;
                const li = document.createElement('li');
                const image = document.createElement('img');
                image.src = imageUrl;
                image.alt = `${tvSeries.name}`;
                image.style.width = "80px";
                image.style.height = "80px";
                image.classList.add('position-absolute');
                li.classList.add('list-group-item');
                li.style.cursor = 'pointer';
                li.setAttribute('id', `${ tvSeries.id}`);
                li.innerHTML = `${ tvSeries.name}`;
                li.appendChild(image);

                li.onclick = function() {
                    const title = document.getElementById(`${tvSeries.id}`);
                    const searchInput = document.getElementById('searchInput');
                    const image = document.getElementById('image');
                    const productFile = document.getElementById('tvSeriesFile');

                    searchInput.value = title.innerText;
                    tvSeriesApiId.value = tvSeries.id;

                    image.src =
                        `https://image.tmdb.org/t/p/w500/${tvSeries.poster_path }`;
                    imageUrlHidden.value = image.src;
                    dropDown.style.display = "none";
                    productFile.style.display = "none";
                    console.log(title);
                }
                dropDown.appendChild(li);
            });

        } else if (query.length == 0) {
            dropDown.style.display = "none";
        }


    }
</script>
