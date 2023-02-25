@extends('frontEnd.master')

@section('title', 'Movie Details')

@section('main-content')


    <section class="theme-color-purple" style="background-color: black;">
        <div class="main-wrapper">
            <!--  sidebar-opened -->
            <div class="swipeleft">
            </div>
            <div class="swiperight">
            </div>

            <div class="main-wrapper"
                style="max-width: 1200px; display: block; margin-left: auto;  margin-right: auto; background-color: white;">
                <!--  sidebar-opened -->

                <main>
                    <style type="text/css">
                        .vcenter {
                            display: inline-block;
                            vertical-align: middle;
                        }
                    </style>

                    <div style="background-color: #000000; border-top: 10px solid black; border-bottom: 10px solid black;">
                        <video id='video-id' style="width: 100%; height: auto;" controls>
                            <source src="{{ $children->productUrl }}" title='{{ $children->productTitle }}'
                                type='video/mp4' />
                        </video>
                    </div>


                    <!--td rowspan="13" style="width: auto; " > </td-->
                    <div style="margin: 15px;">
                        <div class="row" style="">
                            <div class="col-md-4 vcenter" style="text-align: center;">
                                <img style="width: 300px; height: 450px; margin: auto;"
                                    src="{{ asset('/') }}{{ $children->productFile }}" />

                            </div>
                            <div class="col-md-8 vcenter">
                                <div class="news-container" style="padding-bottom: 0px;">
                                    <table class="table ewTable table-bordered" style="background-color: white;">
                                        <tr>
                                            <td colspan="2"
                                                style="width: auto; font-size: 30px; text-transform: uppercase;">
                                                <strong>{{ $children->productTitle }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Year:</td>
                                            <td>{{ $children->year }}</td>
                                        </tr>
                                        <tr>
                                            <td>Released:</td>
                                            <td>N/A</td>
                                        </tr>
                                        <tr>
                                            <td>Runtime:</td>
                                            <td>N/A</td>
                                        </tr>
                                        <tr>
                                            <td>Rating:</td>
                                            <td>{{ $children->rating }}</td>
                                        </tr>
                                        <tr>
                                            <td>Genre:</td>
                                            <td>{{ $children->subCategoryTitle }}</td>
                                        </tr>
                                        <tr>
                                            <td>Director:</td>
                                            <td>M/A</td>
                                        </tr>

                                        <tr>
                                            <td>Language:</td>
                                            <td>{{ $children->subCategoryTitle }}</td>
                                        </tr>

                                        <tr>
                                            <td>Awards:</td>
                                            <td>N/A</td>
                                        </tr>
                                        <tr>
                                            <td>Writer:</td>
                                            <td>N/A</td>
                                        </tr>
                                        <tr>
                                            <td>Plot:</td>
                                            <td>N/A</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr style="margin-top: 0;" />
                        <div style="height: 30px;">
                            <div class="btn-group pull-right" role="group">

                                <a type="button" class="btn btn-info" style="width: 180px;"
                                    href="{{ $children->productUrl }}" download>
                                    <strong>DOWNLOAD</strong> </a>

                            </div>

                        </div>
                    </div>

                    <div class="news-container">
                        <ul class="news-bar nav nav-tabs" style="background-color: #E2E2E2;">
                            <li class="active" style=""><a
                                    style="font-size: 26px; margin-left: 65px;background-color: transparent;">RELATED</a>
                            </li>
                        </ul>
                        <div class="tab-content news-content clearfix">
                            <div class="tab-pane active load-post-body" id="news-stories">
                                <div class="content news-gallery">
                                    <div class="date-bar"></div>

                                    @foreach ($relatedProduct as $reletedPro)
                                        <div class="post post-height hover-img-scale wow fadeInUp" style="height: 450px;"
                                            data-rating="5" data-wow-duration="0.7s" data-wow-offset="0">
                                            <div class="post-wrapper">
                                                <a class="image" onclick="UpdateHits('23613','visit')"
                                                    href="{{ route('movie', ['id' => $reletedPro->id]) }}"><img
                                                        src="{{ asset('/') }}{{ $reletedPro->productFile }}"
                                                        alt="{{ $reletedPro->productTitle }}"
                                                        style="width:100%; height: auto;" /></a>
                                                <div class="block">

                                                    <div class="title">
                                                        {{ $reletedPro->productTitle }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p></p>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>

                </main>
                <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="pswp__bg"></div>
                    <div class="pswp__scroll-wrap">
                        <div class="pswp__container">
                            <div class="pswp__item">
                            </div>
                            <div class="pswp__item">
                            </div>
                            <div class="pswp__item">
                            </div>
                        </div>
                        <div class="pswp__ui pswp__ui--hidden">
                            <div class="pswp__top-bar">
                                <div class="pswp__counter">
                                </div>
                                <button class="pswp__button pswp__button--close" title="Close (Esc)">
                                </button>
                                <button class="pswp__button pswp__button--share" title="Share">
                                </button>
                                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen">
                                </button>
                                <button class="pswp__button pswp__button--zoom" title="Zoom in/out">
                                </button>
                                <div class="pswp__preloader">
                                    <div class="pswp__preloader__icn">
                                        <div class="pswp__preloader__cut">
                                            <div class="pswp__preloader__donut">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                <div class="pswp__share-tooltip">
                                </div>
                            </div>
                            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                            </button>
                            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                            </button>
                            <div class="pswp__caption">
                                <div class="pswp__caption__center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            </body>

        @endsection
