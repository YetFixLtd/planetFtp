@extends('front.master')
@section('content')

<br><br><br><br>
<section class="hg_section ptop-0 pbottom-0" style="background-color: #000000">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12">


                <div class="tabbable tabs_style5">
                    {{-- @php
                    $children = DB::table('sub_categories')
                    ->where('sub_categories.id', '=', $id)
                    ->select('sub_categories.*')
                    ->get();
                    @enphp  --}}
                    @foreach($children2 as $product)
                    <h3 style="text-align:center">{{$product->subCategoryTitle}}</h3>
                    @endforeach
                    <div class="tab-content">
                        <!-- Tab #1 -->
                        <div class="tab-pane active" id="tabs_i2-pane1">

                            @foreach($children as $product)

                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs1-8 col-xs-12">
                                <a href="{{url('/others/'.$product->id)}}"
                                    class="thumb hoverBorder plus boxHov1"
                                    onmouseover="document.getElementById('{{($product->id)}}').style.display = 'block';"
                                    onMouseOut="document.getElementById('{{($product->id)}}').style.display = 'none';"
                                    style="margin-bottom:0px;">

                                    <span class="hoverBorderWrapper">

                                        <img src="{{asset($product->productFile)}}"
                                            onerror="this.src='http://image.tmdb.org/t/p/w500/fm0sn57GF0LmWVlxZ4tv6IhP4Nl.jpg"
                                            class="img-responsive offer-banners-img" alt="" title=""
                                            style="height:auto;width:100%">
                                    
                                        <span class="theHoverBorder"></span>
                                    </span>

                                </a>
                                <div class="post-details" style="line-height:1.2em;margin-bottom:15px;">
                                    <p class="MovieTitle">
                                        <a href="{{url('/others/'.$product->id)}}"
                                            title="Super Over">{{$product->productTitle}}</a>
                                        <a href="{{url('/others/'.$product->id)}}" title="Super Over"
                                            style="padding: 1px 4px;font-size: 11px;margin-right: 6%;float:right;">
                                            <span>{{$product->year}}</span>
                                            <span class="MovieRatings">{{$product->rating}}</span>
                                        </a>
                                    </p>
                                </div>

                            </div>
                            @endforeach
                        </div>

                    </div>
                    <!--/ container -->
                </div>
            </div>
        </div>
    </div>

</section>

@endsection