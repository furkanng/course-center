<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Eduker - Online Course & Education HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/owl-carousel.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/swiper-bundle.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/backtotop.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/font-awesome-pro.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/spacing.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">
</head>
<body>

<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- pre loader area start
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
-->
<!-- pre loader area end -->

<!-- back to top start -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
</div>
<!-- back to top end -->

<!-- header area start -->
@include('front.inc.header')
<!-- header area end -->

<!-- mobile menu start -->
<section id="header-sticky" class="mobile__menu header__area">
    <div class="header__bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-8 col-xl-9 col-lg-10 col-md-6 col-6">
                    <div class="header__bottom-left d-flex align-items-center">
                        <div class="logo">
                            <a href="index.html">
                                <img src="assets/img/logo/logo-3.png" alt="logo">
                            </a>
                        </div>
                        <div class="main-menu main-menu-2 main-menu-mobile ml-30 pl-30">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="has-dropdown">
                                        <a href="index.html">Home</a>
                                        <ul class="submenu">
                                            <li><a href="index.html">Home Style 1</a></li>
                                            <li><a href="index-2.html">Home Style 2</a></li>
                                            <li><a href="index-3.html">Home Style 3</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="about.html">About</a>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="course-v1.html">Courses</a>
                                        <ul class="submenu">
                                            <li><a href="course-v1.html">Course Style 1</a></li>
                                            <li><a href="course-v2.html">Course Style 2</a></li>
                                            <li><a href="course-sidebar.html">Course Sidebar</a></li>
                                            <li><a href="course-details.html">Course Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="about.html">Pages</a>
                                        <ul class="submenu">
                                            <li><a href="event.html">Our Events</a></li>
                                            <li><a href="event-details.html">Event Details</a></li>
                                            <li><a href="team.html">Team</a></li>
                                            <li><a href="team-details.html">Team Details</a></li>
                                            <li><a href="error.html">404 Error</a></li>
                                            <li><a href="my-profile.html">My Profile</a></li>
                                            <li><a href="my-course.html">My Courses</a></li>
                                            <li><a href="sign-in.html">Sign In</a></li>
                                            <li><a href="sign-up.html">Sign Up</a></li>
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="blog.html">Blog</a>
                                        <ul class="submenu">
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="contact.html">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-3 col-lg-2 col-md-6 col-6">
                    <div class="header__bottom-right d-flex justify-content-end align-items-center pl-30">
                        <div class="header__action d-none d-xl-block">
                            <ul>
                                <li>
                                    <a href="sign-in.html">
                                        <svg width="15" height="20" viewBox="0 0 15 20" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.1466 8.96416C7.05493 8.95499 6.94493 8.95499 6.8441 8.96416C4.66243 8.89083 2.92993 7.10333 2.92993 4.90333C2.92993 2.65749 4.74493 0.833328 6.99993 0.833328C9.24576 0.833328 11.0699 2.65749 11.0699 4.90333C11.0608 7.10333 9.32826 8.89083 7.1466 8.96416Z"
                                                stroke="#0C140F" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                            <path
                                                d="M2.56341 12.3467C0.345075 13.8317 0.345075 16.2517 2.56341 17.7275C5.08424 19.4142 9.21841 19.4142 11.7392 17.7275C13.9576 16.2425 13.9576 13.8225 11.7392 12.3467C9.22758 10.6692 5.09341 10.6692 2.56341 12.3467Z"
                                                stroke="#0C140F" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="header__search header__search-2 header__search-3 d-none d-xl-block">
                            <form action="#">
                                <div class="header__search-input">
                                    <input type="text" placeholder="Search...">
                                    <button class="header__search-btn">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.11111 15.2222C12.0385 15.2222 15.2222 12.0385 15.2222 8.11111C15.2222 4.18375 12.0385 1 8.11111 1C4.18375 1 1 4.18375 1 8.11111C1 12.0385 4.18375 15.2222 8.11111 15.2222Z"
                                                stroke="#3E8454" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                            <path d="M17 17L13.1333 13.1333" stroke="#3E8454" stroke-width="2"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="header__hamburger ml-50 d-xl-none">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#offcanvasmodal"
                                    class="hamurger-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- mobile menu end -->

<!-- offcanvas area start -->
<div class="offcanvas__area">
    <div class="modal fade" id="offcanvasmodal" tabindex="-1" aria-labelledby="offcanvasmodal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="offcanvas__wrapper">
                    <div class="offcanvas__content">
                        <div class="offcanvas__top mb-40 d-flex justify-content-between align-items-center">
                            <div class="offcanvas__logo logo">
                                <a href="index.html">
                                    <img src="assets/img/logo/logo-3.png" alt="logo">
                                </a>
                            </div>
                            <div class="offcanvas__close">
                                <button class="offcanvas__close-btn" data-bs-toggle="modal"
                                        data-bs-target="#offcanvasmodal">
                                    <i class="fal fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="offcanvas__search mb-25">
                            <form action="#">
                                <input type="text" placeholder="What are you searching for?">
                                <button type="submit"><i class="far fa-search"></i></button>
                            </form>
                        </div>
                        <div class="mobile-menu fix"></div>
                        <div class="offcanvas__text d-none d-lg-block">
                            <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising
                                pain was born and will give you a complete account of the system and expound the actual
                                teachings of the great explore</p>
                        </div>
                        <div class="offcanvas__map d-none d-lg-block mb-15">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29176.030811137334!2d90.3883827!3d23.924917699999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1605272373598!5m2!1sen!2sbd"></iframe>
                        </div>
                        <div class="offcanvas__contact mt-30 mb-20">
                            <h4>Contact Info</h4>
                            <ul>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="fal fa-map-marker-alt"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a target="_blank"
                                           href="https://www.google.com/maps/place/Dhaka/@23.7806207,90.3492859,12z/data=!3m1!4b1!4m5!3m4!1s0x3755b8b087026b81:0x8fa563bbdd5904c2!8m2!3d23.8104753!4d90.4119873">12/A,
                                            Mirnada City Tower, NYC</a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="far fa-phone"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a href="mailto:support@gmail.com">088889797697</a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="fal fa-envelope"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a href="tel:+012-345-6789">support@mail.com</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="offcanvas__social">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- offcanvas area end -->
<div class="body-overlay"></div>
<!-- offcanvas area end -->

<main>

    @yield('content')

</main>

<!-- footer area start -->
@yield('footer')
<!-- footer area end -->

<!-- JS here -->
<script src="{{asset('front/assets/js/vendor/jquery.js')}}"></script>
<script src="{{asset('front/assets/js/vendor/waypoints.js')}}"></script>
<script src="{{asset('front/assets/js/bootstrap-bundle.js')}}"></script>
<script src="{{asset('front/assets/js/meanmenu.js')}}"></script>
<script src="{{asset('front/assets/js/swiper-bundle.js')}}"></script>
<script src="{{asset('front/assets/js/owl-carousel.js')}}"></script>
<script src="{{asset('front/assets/js/magnific-popup.js')}}"></script>
<script src="{{asset('front/assets/js/parallax.js')}}"></script>
<script src="{{asset('front/assets/js/backtotop.js')}}"></script>
<script src="{{asset('front/assets/js/nice-select.js')}}"></script>
<script src="{{asset('front/assets/js/counterup.js')}}"></script>
<script src="{{asset('front/assets/js/wow.js')}}"></script>
<script src="{{asset('front/assets/js/isotope-pkgd.js')}}"></script>
<script src="{{asset('front/assets/js/imagesloaded-pkgd.js')}}"></script>
<script src="{{asset('front/assets/js/ajax-form.js')}}"></script>
<script src="{{asset('front/assets/js/main.js')}}"></script>
</body>
</html>
