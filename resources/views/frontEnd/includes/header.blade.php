<style>
    .search-result {
        background-color: transparent;
        overflow: auto;
        position: fixed;
        height: 98vh;
        right: 10px;
        z-index: -1;
        max-width: 280px;
        min-width: 300px;
        /* box-shadow: 0px 0px 30px rgba(184, 171, 171, 0.2); */
        display: none;

    }

    @media (max-width: 767px) {
        .mobile-color {
            background-color: #5c4444;
            color: white;
        }
    }
</style>

<header class="style1">
    <div class="top-bar hidden-sm hidden-xs">
        <a class="logotype" href="{{ url('/') }}">
            <div class="logo"><img class="mt-8" src="{{ asset('newFrontEnd/logo.png') }}" alt="logotype" /></div>
            <div class="text"><span style="white-space: nowrap;">Home</span></div>
        </a>

    </div>
    <a class="logotype mobile-logotype" href="{{ url('/') }}">
        <div class="logo"><img class="mt-8" src="{{ asset('newFrontEnd/logo.png') }}" alt="logotype" /></div>
        <div class="text"><span style="white-space: nowrap;">Home</span></div>
    </a>

    <div class="search-container float-end">
        <form name="fproductlistsrch" id="fproductlistsrch" class="navbar-form navbar-right" action="">
            <div class="form-group">
                <input type="text" id="txtSearch" name="txtSearch" class="form-control mobile-color"
                    placeholder="Search..." autocomplete="off">
            </div>

        </form>

    </div>

    <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar"
        aria-expanded="false" aria-controls="navbar">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbar">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="{{ $tv->url ?? '' }}"><span
                        style="font-weight: 900; border: 2px solid #800040; border-radius: 5px; padding: 7px;">LIVE
                        TV</span></a>
            </li>
            @php
                $category = \App\Models\Category::where('id', 1)->first();
            @endphp

            <li class="dropdown">
                <a class="dropdown-toggle" href="{{ url('/') }}" data-toggle="dropdown" role="button"
                    aria-haspopup="true" aria-expanded="false">{{ $category->categoryTitle ?? '' }}<i
                        class="fa fa-chevron-down"></i></a>
                <ul class="dropdown-menu">
                    @php
                        $subCategory = \App\Models\SubCategory::where('categoryId', 1)->get();
                    @endphp

                    @foreach ($subCategory as $item)
                        <li>
                            <a
                                href="{{ route('/subCatProductRoute', ['id' => $item->id]) }}">{{ $item->subCategoryTitle }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            @php
                $category = \App\Models\Category::where('id', 2)->first();
            @endphp
            <li class="dropdown">
                <a class="dropdown-toggle" href="{{ url('/') }}" data-toggle="dropdown" role="button"
                    aria-haspopup="true" aria-expanded="false">{{ $category->categoryTitle ?? '' }}<i
                        class="fa fa-chevron-down"></i></a>
                <ul class="dropdown-menu">

                    @php
                        $subCategory = \App\Models\SubCategory::where('categoryId', 2)->get();
                    @endphp

                    @foreach ($subCategory as $item)
                        <li>
                            <a
                                href="{{ route('/subCatProductRoute', ['id' => $item->id]) }}">{{ $item->subCategoryTitle }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            @php
                $category = \App\Models\Category::where('id', 3)->first();
            @endphp
            <li class="dropdown">
                <a class="dropdown-toggle" href="{{ url('/') }}" data-toggle="dropdown" role="button"
                    aria-haspopup="true" aria-expanded="false">{{ $category->categoryTitle ?? '' }}<i
                        class="fa fa-chevron-down"></i></a>
                <ul class="dropdown-menu">
                    @php
                        $subCategory = \App\Models\SubCategory::where('categoryId', 3)->get();
                    @endphp

                    @foreach ($subCategory as $item)
                        <li>
                            <a
                                href="{{ route('/subCatProductRoute', ['id' => $item->id]) }}">{{ $item->subCategoryTitle }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            @php
                $category = \App\Models\Category::where('id', 4)->first();
            @endphp
            <li class="dropdown">
                <a class="dropdown-toggle" href="{{ url('/') }}" data-toggle="dropdown" role="button"
                    aria-haspopup="true" aria-expanded="false">{{ $category->categoryTitle ?? '' }}<i
                        class="fa fa-chevron-down"></i></a>
                <ul class="dropdown-menu">
                    @php
                        $subCategory = \App\Models\SubCategory::where('categoryId', 4)->get();
                    @endphp

                    @foreach ($subCategory as $item)
                        <li>
                            <a
                                href="{{ route('/subCatTvSeries', ['id' => $item->id]) }}">{{ $item->subCategoryTitle }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            {{-- @php
                $category = \App\Models\Category::where('id', 5)->first();
            @endphp --}}
            {{-- <li class="dropdown">
                <a class="dropdown-toggle" href="{{ url('/') }}" data-toggle="dropdown" role="button"
                    aria-haspopup="true" aria-expanded="false">{{ $category->categoryTitle ?? '' }}<i
                        class="fa fa-chevron-down"></i></a>
                <ul class="dropdown-menu">
                    @php
                        $subCategory = \App\Models\SubCategory::where('categoryId', 5)->get();
                    @endphp

                    @foreach ($subCategory as $item)
                        <li>
                            <a
                                href="{{ route('/subCatProductRoute', ['id' => $item->id]) }}">{{ $item->subCategoryTitle }}</a>
                        </li>
                    @endforeach
                </ul>
            </li> --}}


            <li class="dropdown">
                <a class="dropdown-toggle" href="" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">Links<i class="fa fa-chevron-down"></i></a>
                <ul class="dropdown-menu">
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="{{ $index->url ?? '' }}">Index</a>
                    </li>
                    <li class="dropdown">
                        {{-- <a class="dropdown-toggle" href="{{ $partner->url ?? '' }}">Partner FTP</a> --}}
                        <a class="dropdown-toggle" href="#">Partner FTP</a>
                    </li>
                </ul>
            </li>



        </ul>



    </div>

    <div class="col-md-offset-10 search-result" id="result-container">
        <ul id="result" class="list-group">

        </ul>
    </div>



</header>

<script>
    const input = document.getElementById("txtSearch");
    const result = document.getElementById("result-container");

    const displayResult = function() {
        if (input.value.trim() === "") {
            result.style.display = "none";
        } else {
            result.style.display = "block";
        }
    }

    window.addEventListener('click', function(event) {

        const targetElement = event.target;
        const targetedClass = targetElement.classList;
        if (targetedClass[0] === 'owl-next') {
            return null;
        } else {
            result.style.display = "none";
        }

    });

    window.addEventListener('resize', function() {
        result.style.display = "none";
    });

    input.addEventListener("keyup", displayResult);
</script>
