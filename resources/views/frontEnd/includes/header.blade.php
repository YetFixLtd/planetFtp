<header class="style1">
    <div class="top-bar hidden-sm hidden-xs">
        <a class="logotype" href="{{ url('/') }}">
            <div class="logo"><img class="mt-8" src="{{ asset('newFrontEnd/logo.png') }}" alt="logotype" /></div>
            <div class="text"><span style="white-space: nowrap;">FTP SERVER</span></div>
        </a>
    </div>
    <a class="logotype mobile-logotype" href="{{ url('/') }}">
        <div class="logo"><img class="mt-8" src="{{ asset('newFrontEnd/logo.png') }}" alt="logotype" /></div>
        <div class="text"><span style="white-space: nowrap;">FTP SERVER</span></div>
    </a>
    <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar"
        aria-expanded="false" aria-controls="navbar">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbar">
        <ul class="nav navbar-nav">
            {{-- <li class="dropdown">
                <a href="{{ url('/') }}"><span
                        style="font-weight: 900; border: 2px solid #800040; border-radius: 5px; padding: 7px;">LIVE
                        TV</span></a>
            </li> --}}
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
            @php
                $category = \App\Models\Category::where('id', 5)->first();
            @endphp
            <li class="dropdown">
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
            </li>
        </ul>

        <div class="search-container">
            <form name="fproductlistsrch" id="fproductlistsrch" class="navbar-form navbar-right" action="">
                <div class="form-group">
                    <input type="text" id="txtSearch" name="txtSearch" class="form-control" placeholder="Search..."
                        autocomplete="off">
                </div>
            </form>
        </div>

    </div>

    <div id="result" class="col-md-offset-10"></div>

</header>
