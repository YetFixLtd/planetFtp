<section class="hg_section ptop-0 pbottom-0" style="background-color: #000000">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">

                <div class="tabbable tabs_style5">
                    <!-- Navigation menu -->
                    <ul class="nav fixclear">
                        <!-- Tab #1 -->
                        <li class="active"><a href="#tabs_i2-pane1" data-toggle="tab">Recent Tamil Movies Uploads</a></li>
                        <!--/ Tab #1 -->
                    </ul>
                    <!--/ Navigation menu -->

                    <!-- Tabs content -->
                    <div class="tab-content">
                        <!-- Tab #1 -->
                        <div class="tab-pane active" id="tabs_i2-pane1">

                            @php
                            $products=DB::table('products')
                            ->join('sub_categories', 'products.SubCategoryId', '=', 'sub_categories.id')
                            ->select('products.*', 'sub_categories.subCategoryTitle')
                            ->orderBy('products.id', 'DESC')
                            ->where('products.SubCategoryId', 7)
                            ->paginate(8);
                            // ->get();

                            @endphp
                            @foreach($products as $product)


                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs1-8 col-xs-12">
                                    <a href="{{url('/movie/'.$product->id)}}"
                                        class="thumb hoverBorder plus boxHov1"
                                        onmouseover="document.getElementById('{{$product->id}}').style.display = 'block';"
                                        onMouseOut="document.getElementById('{{$product->id}}').style.display = 'none';"
                                        style="margin-bottom:0px;">
    
                                        <span class="hoverBorderWrapper">
    
                                            <img src="{{asset($product->productFile)}}"
                                                onerror="this.src='http://image.tmdb.org/t/p/w500/rejrD9ovTHJbfmpLM0mbEliEPV6.jpg"
                                                class="img-responsive offer-banners-img" alt="" title=""
                                                style="height:200px;width:160px">
    
                                            <span class="MovieQuality">1080 WEB-DL</span><span
                                                class="theHoverBorder"></span>
                                        </span>
    
                                    </a>
                                    <div class="post-details" style="line-height:1.2em;margin-bottom:15px;">
                                        <p class="MovieTitle">
                                            <a href="{{url('/movie/'.$product->id)}}"
                                                title="Yes Day">{{$product->productTitle}}</a>
                                            <a href="{{url('/movie/'.$product->id)}}" title="Yes Day"
                                                style="padding: 1px 4px;font-size: 11px;margin-right: 6%;float:right;">
                                                <span>{{$product->year}}</span>
                                                <span class="MovieRatings">{{$product->rating}}</span>
    
                                        </p>
                                    </div>
    
    
                                    <div class="displayHover1 BoxCss" id="{{$product->id}}" style=""
                                        onmouseover="document.getElementById('{{$product->id}}').style.display = 'block';"
                                        onMouseOut="document.getElementById('{{$product->id}}').style.display = 'none';">
                                        <div class="arrow_box"></div>
    
                                        <div class="headBox">
    
                                            <ul>
                                                <li style="margin-left: -17px;">
                                                    <font style="font-size:16px;color:#fff;">{{$product->rating}}</font>
                                                    <br><img src="{{asset('assets/images/imdb_logo.jpg')}}"
                                                        style="width:28px;margin-top:-15px;" />
                                                </li>
                                                <li style="margin-left: 19px;">
                                                    <font style="font-size:16px;color:#fff;">{{$product->year}}</font> <br>
                                                    <div style="margin-top: -7px;color: #fff;">YEAR</div>
                                                </li>
                                                <li style="margin-left: 19px;">
                                                    <font style="font-size:14px;color:#fff;margin-left:0px;">1080 WEB-DL
                                                    </font> <br>
                                                    <div style="margin-top: -7px;color: #fff;">Quality</div>
                                                </li>
                                                <li style="margin-left: 20px;margin-top: 6px;"><a href="#" class="flove"
                                                        title="add to favourite list"><span
                                                            class="grid-ibx__icon glyphicon glyphicon-heart-empty"></span></a>
                                                </li>
                                            </ul>
    
                                        </div>
    
                                        <div class="col-md-9" style="clear:left;background:-color:#fff;">
                                            <div style="font-size: 21px;margin-top: 10px;margin-bottom: -27px;">
                                                {{$product->productTitle}}
                                            </div><br>
                                            <div style="font-size: 10px;"><a
                                                    href="">Comedy</a>
                                                ,<a
                                                    href="">Family</a>,
                                            </div>
                                        </div>
                                  
                                        <div class="col-md-12"
                                            style="font-size: 16px;font-weight: bold;margin-top: 8px;line-height: 15px;">
                                            {{$product->productTitle}}</div>
                                        <div class="col-md-12" style="{{$product->productDescription}}<a
                                                href="">More</a>. <br>
                                            <a class="btn-element btn btn-fullcolor btn-sm "
                                                href="" data-lightbox="iframe"
                                                title="Watch Trailer" style="margin:5px 5px 5px 0;"><span><i
                                                        class="grid-ibx__icon glyphicon glyphicon-play"
                                                        style="font-size:11px;"></i> Trailer</span></a>
    
                                            <a class="btn-element btn btn-lined lined-dark btn-sm "
                                                href="" title="Play Now"
                                                style="margin: 5px 0px 4px -4px;"><span><i
                                                        class="grid-ibx__icon glyphicon glyphicon-play"
                                                        style="font-size:11px;"></i> Watch Now</span></a>
    
                                            <a class="btn-element btn btn-success lined-dark btn-sm " href="#"
                                                title="Add to Playlist" style="margin: 1px 0px 0px 1px;"><span><i
                                                        class="grid-ibx__icon glyphicon glyphicon-plus"
                                                        style="font-size:11px;"></i></span></a>
                                        </div>
    
                                    </div>
    
    
                                </div>
                            @endforeach
                            {{ $products->links() }}
                            <!--/ container -->
</section>