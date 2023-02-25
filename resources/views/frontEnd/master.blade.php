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

    {{-- <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
    <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" /> --}}

    @include('frontEnd.includes.style')
    @stack('css')

</head>

<body class="theme-color-purple">


    <div class="main-wrapper">
        <!--  sidebar-opened -->
        <div class="swipeleft"></div>
        <div class="swiperight"></div>

        @include('frontEnd.includes.header')

        @yield('main-content')

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
