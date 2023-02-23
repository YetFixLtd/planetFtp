<div class="kl-slideshow kl-slideshow-css3panels">
    <!-- Fake loading -->
    <div class="fake-loading loading-1s">
    </div>

    <!-- CSS3 Panels container with custom height -->
    <div class="css3panels-container css3panels--resize cssp-capt-animated cssp-capt-fadeout" data-panels="4"
        style="height:700px">



        <!-- Panel #1 light style -->

        @php
        $sliders = DB::table('sliders')
        ->select('sliders.*')
        ->get();
        @endphp

        @foreach($sliders as $slider)



        <div class="css3panel css3panel--1 cp-theme--light">
            <!-- Panel wrapper with custom height -->
            <div class="css3panel-inner" style="height:700px">
                <!-- Main image wrapper with custom height -->
                <div class="css3panel-mainimage-wrapper" style="height:700px">
                    <!-- Background main image -->
                    <div style="background-image:url({{asset($slider->productFile)}});"
                        class="css3panel-mainimage">
                        <!-- Blured image -->
                        <div style="background-image:url({{asset($slider->productFile)}});"
                            class="css3panel-mainimage css3panel-mainimage-effect anim--grayscale">
                        </div>

                        <!-- Gradient/Color overlay -->
                        <div class="css3p-overlay css3p-overlay--gradient" style="">
                        </div>
                    </div>
                    <!--/ Background main image -->
                </div>
                <!--/ Main image wrapper with custom height -->
            </div>
            <!-- Panel wrapper with custom height -->

            <!-- Caption -->
            <div class="css3panel-caption">
                <!-- Link with title -->
                <a href="{{ url('/') }}" target="_self"
                    title="SPEED">
                    <h3 class="css3panel-title ff-alternative title-size-normal">{{$slider->title}}</h3>
                </a>
                <!--/ Link with title -->

                <!-- Description -->
                <div class="css3panel-text">
                    <b style="font-size:12px;">{{$slider->rating}}</b><br>
                    {{$slider->description}}
                </div>
                <!--/ Description -->

                <!-- Button -->
                <div class="css3panel-btn-area">
                    <!-- Button skewed full color skewed style -->
                    <a href="{{$slider->productUrl}}"
                        class="btn btn-fullcolor btn-skewed" target="_self" title="LEARN MORE">Play Now</a>
                </div>
                <!--/ Button -->
            </div>
            <!--/ Caption -->
        </div>

        @endforeach



        <!--/ Panel #1 -->


        <!-- Panel #1 light style -->
        {{-- <div class="css3panel css3panel--1 cp-theme--light">
            <!-- Panel wrapper with custom height -->
            <div class="css3panel-inner" style="height:700px">
                <!-- Main image wrapper with custom height -->
                <div class="css3panel-mainimage-wrapper" style="height:700px">
                    <!-- Background main image -->
                    <div style="background-image:url(http://timepassbd.live/Admin/main/images/tt9592496/poster/original/nf7ylHxJfgKvoC8o7LhqvTQzcb3.jpg);"
                        class="css3panel-mainimage">
                        <!-- Blured image -->
                        <div style="background-image:url(http://timepassbd.live/Admin/main/images/tt9592496/poster/original/nf7ylHxJfgKvoC8o7LhqvTQzcb3.jpg);"
                            class="css3panel-mainimage css3panel-mainimage-effect anim--grayscale">
                        </div>

                        <!-- Gradient/Color overlay -->
                        <div class="css3p-overlay css3p-overlay--gradient" style="">
                        </div>
                    </div>
                    <!--/ Background main image -->
                </div>
                <!--/ Main image wrapper with custom height -->
            </div>
            <!-- Panel wrapper with custom height -->

            <!-- Caption -->
            <div class="css3panel-caption">
                <!-- Link with title -->
                <a href="http://timepassbd.live//movie.php?imdbid=tt9592496&cat=South Indian" target="_self"
                    title="SPEED">
                    <h3 class="css3panel-title ff-alternative title-size-normal">Pogaru [2021]</h3>
                </a>
                <!--/ Link with title -->

                <!-- Description -->
                <div class="css3panel-text">
                    <b style="font-size:12px;">South Indian | 1080 WEB-DL | 5.3 IMdb</b><br>
                    Shiva, a ruffian, is the terror of his area in many ways, but still has a heart of gold. He
                    has just one wish, for his mother to l... </div>
                <!--/ Description -->

                <!-- Button -->
                <div class="css3panel-btn-area">
                    <!-- Button skewed full color skewed style -->
                    <a href="http://timepassbd.live//movie.php?imdbid=tt9592496&cat=South Indian"
                        class="btn btn-fullcolor btn-skewed" target="_self" title="LEARN MORE">Play Now</a>
                </div>
                <!--/ Button -->
            </div>
            <!--/ Caption -->
        </div> --}}





        <!--/ Panel #1 -->


        <!-- Panel #1 light style -->

        <!--/ Panel #1 -->


        <!-- Panel #1 light style -->

        <!--/ Panel #1 -->

    </div>
    <!-- CSS3 Panels container -->

    <div class="clearfix">
    </div>

    <!-- Bottom mask style 2 -->
    <div class="kl-bottommask kl-bottommask--shadow_ud">
    </div>
    <!--/ Bottom mask style 2 -->
</div>