<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta name="title" content="">
    <meta name="viewport" content="width=device-width" initial-scale="1" user-scalable="no">
    <meta name="robots" content="noodp,noydir">
    <meta name="theme-color" content="#ffffff">

    <title>@yield('title')</title>

    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
    <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />

    @include('frontEnd.includes.style')
    @stack('css')

</head>

<body class="theme-color-purple">


    <div class="main-wrapper">
        <!--  sidebar-opened -->
        <div class="swipeleft">
        </div>
        <div class="swiperight">
        </div>


        @include('frontEnd.includes.header')


        <main>
            @include('frontEnd.includes.slider')

            @yield('main-content')


        </main>


        {{-- <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
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
        </div> --}}

       
    </div>

    @include('frontEnd.includes.footer')

    <div class="overlay-bg"></div>

    @include('frontEnd.includes.script')

    @stack('js')

</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        AdBox();
    });
</script>
