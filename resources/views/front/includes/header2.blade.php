<div class="container siteheader-container header--oldstyles">
    <!-- Logo container-->
    <div class="logo-container logosize--yes">
        <!-- Logo -->
        <h1 class="site-logo logo" id="logo">
            <a href="{{ url('/') }}" title="">
                <img src="{{ asset('assets/logo.png') }}" class="logo-img" alt="Rs ftp logo"
                    title="RS ftp logo">
            </a>
        </h1>
        <!--/ Logo -->

    </div>

    <!--/ Logo container-->

    <!-- separator for responsive header -->
    <div class="separator site-header-separator visible-xs"></div>
    <!--/ separator for responsive header -->

    <!-- separator for responsive header -->
    <div class="separator site-header-separator visible-xs"></div>
    <!--/ separator for responsive header -->

    <!-- header search -->
    <div id="search" class="header-search">
        <a href="#" class="searchBtn "><span class="glyphicon glyphicon-search icon-white"></span></a>
        <div class="search-container">
            <form method="get" action="">
                <div class="input-group stylish-input-group">
                    <input type="text" id="txtSearch" name="txtSearch" class="form-control" placeholder="Search..."
                        autocomplete="off">
                </div>
            </form>
            {{-- style="background-color: rgba(8, 8, 8, 0.76)" --}}
            <div id="result" >
            </div>
        </div>
        <div id="suggestions" style="margin-left:-35px;display:block  "></div>
    </div>
    <!--/ header search -->


    <!-- responsive menu trigger -->
    <div id="zn-res-menuwrapper">
        <a href="#" class="zn-res-trigger zn-header-icon"></a>
    </div>
    <!--/ responsive menu trigger -->

    <!-- main menu -->
    <div id="main-menu" class="main-nav zn_mega_wrapper " style="margin-right:3%;margin-top:5px;">

        <ul id="menu-main-menu" class="main-menu zn_mega_menu">

        <li class="menu-item-has-children" style=""><a href="{{ url('/') }}">Home</a></li>

            <li class="menu-item-has-children" style="">
                @php
                $category=\App\Models\Category::where('id', 1)->first();
                @endphp
                <a
                    href="{{ url('/') }}">{{ $category->categoryTitle }}
                </a>


                <ul class="sub-menu clearfix">
                    @php
                    // $children=\App\Models\SubCategory::where('categoryId',$category->id)->get();
                    $subCategory=\App\Models\SubCategory::where('categoryId', 1)->get();
                    @endphp

                    @foreach($subCategory as $c)
                    <li><a href="{{route('/subCatProductRoute',['id' => $c->id])}}">{{ $c->subCategoryTitle }}</a>
                    </li>
                    @endforeach

                </ul>
            </li>

            <li class="menu-item-has-children" style="">
                @php
                $category=\App\Models\Category::where('id', 2)->first();
                @endphp
                <a
                    href="{{ url('/') }}">{{ $category->categoryTitle }}
                </a>

                <ul class="sub-menu clearfix">
                    @php
                    // $children=\App\Models\SubCategory::where('categoryId',$category->id)->get();
                    $subCategory=\App\Models\SubCategory::where('categoryId', 2)->get();
                    @endphp

                    @foreach($subCategory as $c)
                    <li><a href="{{route('/subCatTvSeries',['id' => $c->id])}}">{{ $c->subCategoryTitle }}</a>
                    </li>
                    @endforeach


                </ul>
            </li>
            <li class="menu-item-has-children">
                @php
                $category=\App\Models\Category::where('id', 3)->first();
                @endphp
                <a
                    href="{{ url('/') }}">{{ $category->categoryTitle }}
                </a>

                <ul class="sub-menu clearfix">
                    @php
                    // $children=\App\Models\SubCategory::where('categoryId',$category->id)->get();
                    $subCategory=\App\Models\SubCategory::where('categoryId', 3)->get();
                    @endphp

                    @foreach($subCategory as $c)
                    <li><a href="{{route('/subCatOthersRoute',['id' => $c->id])}}">{{ $c->subCategoryTitle }}</a>
                    </li>
                    @endforeach


                </ul>
            </li>

            <li class="menu-item-has-children" style="">
                @php
                $category=\App\Models\Category::where('id', 4)->first();
                @endphp
                <a
                    href="{{ url('/') }}">{{ $category->categoryTitle }}
                </a>

                <ul class="sub-menu clearfix">
                    @php
                    // $children=\App\Models\SubCategory::where('categoryId',$category->id)->get();
                    $subCategory=\App\Models\SubCategory::where('categoryId', 4)->get();
                    @endphp

                    @foreach($subCategory as $c)
                    <li><a href="{{route('/subCatOthersRoute',['id' => $c->id])}}">{{ $c->subCategoryTitle }}</a>
                    </li>
                    @endforeach


                </ul>
            </li>

            <li class="menu-item-has-children" style=""><a href="#">Partner-Ftp</a>

                <ul class="sub-menu clearfix">
                    <li><a href="http://103.110.162.218/" target="_blank">Jellyfin-Server</a></li>
                    <li><a href="http://circleftp.net/" target="_blank">Circle-FTP</a></li>
                    <li><a href="http://10.16.100.244/" target="_blank">ICC-FTP</a></li>
                </ul>

            </li>

            <li class="menu-item-has-children" style=""><a href="#" target="_blank">LIVE TV</a>

            </li>



        </ul>
    </div>
    <!--/ siteheader-container -->
</div>
