@extends('front.master')
@section('content')

<br><br><br><br>
<section class="hg_section ptop-0 pbottom-0" style="background-color: #000000">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12">
          
						

                <div class="tabbable tabs_style5">
                   
                 
                    <h3 style="text-align:center">
                     
                    </h3>

                   
                    {{-- @endforeach --}}
                    <div class="tab-content">
                        <!-- Tab #1 -->
                        <div class="tab-pane active" id="tabs_i2-pane1">

                            @foreach($children as $product)

                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs1-8 col-xs-12">
                                <a href="{{url('/episode/'.$product->id)}}"
                                    class="thumb hoverBorder plus boxHov1"
                                    onmouseover="document.getElementById('{{($product->id)}}').style.display = 'block';"
                                    onMouseOut="document.getElementById('{{($product->id)}}').style.display = 'none';"
                                    style="margin-bottom:0px;">

                                    <span class="hoverBorderWrapper">

                                        <img src="{{asset($product->episodeFile ??'')}}"
                                            onerror="this.src='http://image.tmdb.org/t/p/w500/fm0sn57GF0LmWVlxZ4tv6IhP4Nl.jpg"
                                            class="img-responsive offer-banners-img" alt="" title=""
                                            style="height:200px;width:160px;">
                                        <span class="MovieQuality">1080 WEB-DL</span>
                                        <span class="theHoverBorder"></span>
                                    </span>

                                </a>
                                <div class="post-details" style="line-height:1.2em;margin-bottom:15px;">
                                    <p class="MovieTitle">
                                        <a href="{{url('/episode/'.$product->id)}}"
                                            title="Super Over"></a>
                                        <a href="{{url('/episode/'.$product->id)}}" title="Super Over"
                                            style="padding: 1px 4px;font-size: 11px;margin-right: 6%;float:right;">
                                            <span>{{ $product->episodeTitle }}</span>
                                            <span class="MovieRatings"></span>
                                        </a>
                                    </p>
                                </div>

                                <div class="displayHover1 BoxCss" id=""
                                    onmouseover="document.getElementById('').style.display = 'block';"
                                    onMouseOut="document.getElementById('').style.display = 'none';">
                                    <div class="arrow_box"></div>
                                    <div class="headBox">
                                        <ul>
                                            <li style="margin-left: -17px;">
                                                <font style="font-size:16px;color:#fff;"></font>
                                                <br><img src=""
                                                    style="width:28px;margin-top:-15px;" />
                                            </li>
                                            <li style="margin-left: 19px;">
                                                <font style="font-size:16px;color:#fff;"></font> <br>
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
                                           
                                        </div><br>
                                        <div style="font-size: 10px;"><a
                                                href="">Drama</a>
                                            ,<a
                                                href="">Thriller</a>,
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-12"
                                        style="font-size: 16px;font-weight: bold;margin-top: 8px;line-height: 15px;">
                                       </div>
                                    <div class="col-md-12" style="line-height: 13px;margin-top: 10px;">
                                       <a
                                            href="">More</a>.
                                        <br>
                                        <a class="btn-element btn btn-fullcolor btn-sm "
                                            href="" data-lightbox="iframe"
                                            title="Watch Trailer" style="margin:5px 5px 5px 0;"><span><i
                                                    class="grid-ibx__icon glyphicon glyphicon-play"
                                                    style="font-size:11px;"></i> Trailer</span></a>

                                        <a class="btn-element btn btn-lined lined-dark btn-sm "
                                            href=""
                                            title="Play Now" style="margin: 5px 0px 4px -4px;"><span><i
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
                        </div>

                    </div>
                    <!--/ container -->
                </div>

                
               
            </div>
        </div>
    </div>

</section>

@endsection