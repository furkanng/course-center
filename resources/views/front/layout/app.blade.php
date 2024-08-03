<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("front/assets/img/favicon.png")}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset("front/assets/css/bootstrap.css")}}">
    <link rel="stylesheet" href="{{asset("front/assets/css/meanmenu.css")}}">
    <link rel="stylesheet" href="{{asset("front/assets/css/animate.css")}}">
    <link rel="stylesheet" href="{{asset("front/assets/css/owl-carousel.css")}}">
    <link rel="stylesheet" href="{{asset("front/assets/css/swiper-bundle.css")}}">
    <link rel="stylesheet" href="{{asset("front/assets/css/backtotop.css")}}">
    <link rel="stylesheet" href="{{asset("front/assets/css/magnific-popup.css")}}">
    <link rel="stylesheet" href="{{asset("front/assets/css/nice-select.css")}}">
    <link rel="stylesheet" href="{{asset("front/assets/css/font-awesome-pro.css")}}">
    <link rel="stylesheet" href="{{asset("front/assets/css/spacing.css")}}">
    <link rel="stylesheet" href="{{asset("front/assets/css/style.css")}}">
</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->


<!-- pre loader area start -->
<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <svg id="loader">
                <path id="corners" d="m 0 12.5 l 0 -12.5 l 50 0 l 0 50 l -50 0 l 0 -37.5"/>
            </svg>
            <img src="{{asset("front/assets/img/favicon.png")}}" alt="">
        </div>
    </div>
</div>
<!-- pre loader area end -->

<!-- back to top start -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
</div>
<!-- back to top end -->

@include("front.inc.header")

@yield('content')

@include("front.inc.footer")

<!-- JS here -->
<script src="{{asset("front/assets/js/vendor/jquery.js")}}"></script>
<script src="{{asset("front/assets/js/vendor/waypoints.js")}}"></script>
<script src="{{asset("front/assets/js/bootstrap-bundle.js")}}"></script>
<script src="{{asset("front/assets/js/meanmenu.js")}}"></script>
<script src="{{asset("front/assets/js/swiper-bundle.js")}}"></script>
<script src="{{asset("front/assets/js/owl-carousel.js")}}"></script>
<script src="{{asset("front/assets/js/magnific-popup.js")}}"></script>
<script src="{{asset("front/assets/js/parallax.js")}}"></script>
<script src="{{asset("front/assets/js/backtotop.js")}}"></script>
<script src="{{asset("front/assets/js/nice-select.js")}}"></script>
<script src="{{asset("front/assets/js/counterup.js")}}"></script>
<script src="{{asset("front/assets/js/wow.js")}}"></script>
<script src="{{asset("front/assets/js/isotope-pkgd.js")}}"></script>
<script src="{{asset("front/assets/js/imagesloaded-pkgd.js")}}"></script>
<script src="{{asset("front/assets/js/ajax-form.js")}}"></script>
<script src="{{asset("front/assets/js/main.js")}}"></script>
<script src="{{asset("front/assets/js/service.js")}}"></script>

</body>
</html>
