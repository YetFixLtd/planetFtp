@extends('frontEnd.master')

@section('title', 'Subcategory based Movie')

@section('main-content')


    <body class="theme-color-purple" style="background-color: black;">
        <div class="main-wrapper">
            <!--  sidebar-opened -->
            <div class="swipeleft">
            </div>
            <div class="swiperight">
            </div>

            <div class="main-wrapper"
                style="max-width: 1200px; display: block; margin-left: auto; margin-right: auto; background-color: white;">
                <!--  sidebar-opened -->

                <main>
                    <style type="text/css">
                        .vcenter {
                            display: inline-block;
                            vertical-align: middle;
                        }
                    </style>




                    <!--td rowspan="13" style="width: auto; " > </td-->

                    <div class="news-container">
                        <h3 class="h3 text-center">{{ $sub_category->subCategoryTitle }}</h3>

                        <p>{{ $all_sub_categories }}</p>

                        <div class="tab-content news-content clearfix">
                            <div class="tab-pane active load-post-body" id="news-stories">
                                <div class="content news-gallery">
                                    <div class="date-bar"></div>

                                    @foreach ($children as $child)
                                        <div class="post post-height hover-img-scale wow fadeInUp" style="height: 225px;"
                                            data-rating="5" data-wow-duration="0.7s" data-wow-offset="0">
                                            <div class="post-wrapper">
                                                <a class="image" onclick="UpdateHits('23613','visit')"
                                                    href="{{ route('movie', ['id' => $child->id]) }}"><img
                                                        src="{{ asset('/') }}{{ $child->productFile }}"
                                                        alt="{{ $child->productTitle }}"
                                                        style="width: 100%; height: 100%;" /></a>
                                                <div class="block">

                                                    <div class="title">
                                                        {{ $child->productTitle }}
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

            <div id="adSearch" class="modal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form class="form-inline ewForm" method="post" action="#">
                            <input type="hidden" name="token" value="qQgVnSgMOrVxZx5cUIMZgA..">
                            <input type="hidden" name="ads" value="post">
                            <div class="modal-header">
                                <h3 class="modal-title" style="font-weight: bolder; color: #000000;">Advanced Search</h3>
                            </div>
                            <div class="modal-body">

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-submit ewButton">Search</button>
                                <button type="button" class="btn ewButton" data-dismiss="modal"
                                    aria-hidden="true">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </body>

@endsection
