<br><section class="hg_section--relative pbottom-30 ptop-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                @php
                $cat=DB::table('categories')
                ->select('categories.*')
                ->where('id', 2)
                ->get();

                @endphp
                @foreach($cat as $category)


                <div class="sc__simpleaction" style="margin-bottom:20px;margin-top: 0px;">
                    <!-- Button skewed lined style -->
                    <a href=""
                        class="btn btn-skewed btn-lined" target="_blank" title="View All">Recent TV Series Uploads</a>

                    <!-- Line -->
                    <span class="sc__line"></span>
                </div>
            @endforeach
            <br><br>
                <!-- Latest posts new style 2 element  -->




              


                <div class="latest_posts default-style kl-style-2">
                    <div class="row gutter-sm">
                @php
                $products=DB::table('tv_series')
                ->select('tv_series.*')
                ->orderBy('tv_series.id', 'DESC')
                ->paginate(6);
               // ->get();

                @endphp
                @foreach($products as $product)
                        <div class="col-xs-6 col-sm-2">
                            <!-- Post -->
                            <div class="post">
                                <!-- Post link wrapper -->
                                <a href="{{url('/subCatTvSeason/'.$product->id)}}" class="hoverBorder">
                                    <!-- Border wrapper -->
                                    <span class="hoverBorderWrapper">
                                        <!-- Image -->
                                        <img src="{{asset($product->tvSeriesFile)}}"
                                            class="img-responsive imgbox_image cover-fit-img"
                                            alt="The Game of Keys [2019]" title=""
                                            style="height:250px;width:185px;"
                                            onerror="this.src='images/d38bc38ad9ba60f9091aa2a9b3f4190f.png'">
                                        <!--/ Image -->
                                        <span class="TvCompleted"></span>
                                        <span class="MovieRatings"
                                            style="right: 5px;bottom: 0;font-size: 2.5rem;"></span>
                                        <!-- Hover border/shadow -->
                                        <span class="theHoverBorder"></span>
                                        <!--/ Hover border/shadow -->
                                    </span>
                                    <!--/ Border wrapper -->
                                </a>
                                <!--/ Post link wrapper -->

                                <!-- Post details -->
                                <div class="post-details">
                                    <!-- Title with link -->
                                    <h3 class="m_title"><a href="{{url('/subCatTvSeason/'.$product->id)}}">{{$product->tvSeriesTitle}}</a></h3>

                                    <!--/ Title with link -->

                                    <!-- Details & tags -->
                                    
                                    <!--/ Details & tags -->
                                </div>
                                <!--/ Post details -->
                            </div>
                            <!--/ Post -->
                        </div>
                        @endforeach
                        <!--/ col-xs-6 col-sm-3 -->
                    </div>
                   
                </div>
                
                {{ $products->links() }}






                        <div class="kl-bottommask kl-bottommask--shadow"></div>
</section>