@extends('front.layout.app')

@section('title', 'Home Page')
@section('content')

    <!-- offcanvas area start -->
    <div class="offcanvas__area">
        <div class="modal fade" id="offcanvasmodal" tabindex="-1" aria-labelledby="offcanvasmodal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="offcanvas__wrapper">
                        <div class="offcanvas__content">
                            <div class="offcanvas__top mb-40 d-flex justify-content-between align-items-center">
                                <div class="offcanvas__logo logo">
                                    <a href="/">
                                        <img src="{{asset("front/assets/img/logo/logo-2.png")}}" alt="logo">
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
                                <p>But I must explain to you how all this mistaken idea of denouncing pleasure and
                                    praising
                                    pain was born and will give you a complete account of the system and expound the
                                    actual
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
        <!-- slider area start -->
        <section class="slider__area slider__height-2 include-bg d-flex align-items-center"
                 data-background="{{asset("front/")}}assets/img/slider/2/slider-2-bg.jpg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xxl-6 col-lg-6">
                        <div class="slider__content-2 mt-30">
                            <span>{{$data["slider"]["slider_ust_bilgi_yazisi"]}}</span>
                            <h3 class="slider__title-2">{{$data["slider"]["slider_ana_bilgi_yazisi"]}}</h3>
                            <p>{{$data["slider"]["slider_alt_bilgi_yazisi"]}}</p>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-6">
                        <div class="slider__thumb-2 p-relative">
                            <div class="slider__shape">
                                <img class="slider__shape-1"
                                     src="{{asset("front/assets/img/slider/2/shape/slider-cap-1.png")}}" alt="">
                                <img class="slider__shape-2"
                                     src="{{asset("front/assets/img/slider/2/shape/slider-cap-2.png")}}" alt="">
                                <img class="slider__shape-3"
                                     src="{{asset("front/assets/img/slider/2/shape/slider-cap-3.png")}}" alt="">
                            </div>
                            <span class="slider__thumb-mask">
                                   @if($data["slider"]["slider_orta_resim"] !== "")
                                    <img class="slider__shape-4"
                                         src="{{url($data["slider"]["slider_orta_resim"])}}" alt="">
                                @endif
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- slider area end -->

        <!-- category area start -->
        <section class="category__area pt-105 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-4 col-xl-4 col-lg-4">
                        <div class="category__wrapper">
                            <div class="section__title-wrapper-2">
                                <span
                                    class="section__title-pre-2">{{$data["category"]["category_ust_bilgi_yazisi"]}}</span>
                                <h3 class="section__title-2 section__title-2-30">{{$data["category"]["category_ana_bilgi_yazisi"]}}</h3>
                            </div>
                            <p>{{$data["category"]["category_alt_bilgi_yazisi"]}}</p>
                        </div>
                    </div>
                    <div class="col-xxl-8 col-xl-8 col-lg-8">
                        <div class="category__item-wrapper">
                            <div class="row">
                                @foreach($courses as $course)
                                    @if($course["category_status"] == 1)
                                        <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
                                            <div class="category__item text-center mb-45">
                                                <div class="category__icon {{$course["color"]}}">
                                                    <a href="course-v1.html">
                                                        {!! $course["svg"]  ?? \App\Service\Helper::defaultSVG()!!}
                                                    </a>
                                                </div>
                                                <div class="category__content">
                                                    <h4 class="category__title">
                                                        <a href="course-v1.html">{{$course["name"]}}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                                <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
                                    <div class="category__item text-center mb-45">
                                        <div class="category__icon add">
                                            <a href="course-v1.html">+</a>
                                        </div>
                                        <div class="category__content">
                                            <h4 class="category__title add">
                                                <a href="course-v1.html">Hepsini Gör</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- category area end -->

        <!-- research area start -->
        <section class="research__area pt-115 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="research__wrapper-2">
                            <div class="section__title-wrapper-2">
                                <span
                                    class="section__title-pre-2">{{$data["research"]["research_ust_bilgi_yazisi"]}}</span>
                                <h3 class="section__title-2">{{$data["research"]["research_ana_bilgi_yazisi"]}}</h3>
                            </div>
                            <p>{{$data["research"]["research_alt_bilgi_yazisi"]}}</p>
                            <div class="research__btn-2 mb-70">
                                <a href="contact.html" class="tp-btn-5 tp-btn-6">Şimdi Keşfet</a>
                            </div>

                            <div class="research__download">

                                <div class="research__download-bg include-bg">
                                    <img src="{{url($data["research"]["research_banner_resim"])}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-5 offset-xxl-1 col-xl-5 offset-xl-1 col-lg-6">
                        <div class="research__features-wrapper pt-35">
                            <div class="research__features-item d-sm-flex align-items-start mb-40">
                                <div class="research__features-icon mr-25">
                              <span>
                                 {!! $data["research"]["research_info_svg_1"] ?? \App\Service\Helper::defaultSVG() !!}
                              </span>
                                </div>
                                <div class="research__features-content">
                                    <h4>{{$data["research"]["research_info_title_1"]}}</h4>
                                    <p>{{$data["research"]["research_info_description_1"]}}</p>
                                </div>
                            </div>
                            <div class="research__features-item d-sm-flex align-items-start mb-40">
                                <div class="research__features-icon mr-25">
                              <span class="yellow-bg">
                                {!! $data["research"]["research_info_svg_2"] ?? \App\Service\Helper::defaultSVG() !!}
                              </span>
                                </div>
                                <div class="research__features-content">
                                    <h4>{{$data["research"]["research_info_title_2"]}}</h4>
                                    <p>{{$data["research"]["research_info_description_2"]}}</p>
                                </div>
                            </div>
                            <div class="research__features-item d-sm-flex align-items-start">
                                <div class="research__features-icon mr-25">
                              <span class="green-bg">
                                {!! $data["research"]["research_info_svg_3"] ?? \App\Service\Helper::defaultSVG() !!}
                              </span>
                                </div>
                                <div class="research__features-content">
                                    <h4>{{$data["research"]["research_info_title_3"]}}</h4>
                                    <p>{{$data["research"]["research_info_description_3"]}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- research area end -->

        <!-- event area start -->
        <section class="event__area pt-115">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="section__title-wrapper-2 text-center mb-60">
                            <span class="section__title-pre-2">Featured Courses</span>
                            <h3 class="section__title-2">Join our upcoming event</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div
                            class="event__item white-bg mb-10 transition-3 p-relative d-lg-flex align-items-center justify-content-between">
                            <div class="event__left d-sm-flex align-items-center">
                                <div class="event__date">
                                    <h4>02</h4>
                                    <p>October, 2022</p>
                                </div>
                                <div class="event__content">
                                    <div class="event__meta">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M8.49992 9.51253C9.72047 9.51253 10.7099 8.52308 10.7099 7.30253C10.7099 6.08198 9.72047 5.09253 8.49992 5.09253C7.27937 5.09253 6.28992 6.08198 6.28992 7.30253C6.28992 8.52308 7.27937 9.51253 8.49992 9.51253Z"
                                                            stroke="#5F6160" stroke-width="1.5"/>
                                                        <path
                                                            d="M2.56416 6.01334C3.95958 -0.120822 13.0475 -0.113738 14.4358 6.02043C15.2504 9.61876 13.0121 12.6646 11.05 14.5488C9.62625 15.9229 7.37375 15.9229 5.94291 14.5488C3.98791 12.6646 1.74958 9.61168 2.56416 6.01334Z"
                                                            stroke="#5F6160" stroke-width="1.5"/>
                                                    </svg>
                                                    New York, US</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="event__title">
                                        <a href="event-details.html">Global education fall meeting for everyone</a>
                                    </h3>

                                    <div class="event__person">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img src="{{asset("front/assets/img/event/event-person-1.jpg")}}"
                                                         alt="">
                                                    <img src="{{asset("front/assets/img/event/event-person-2.jpg")}}"
                                                         alt="">
                                                    <span>David Karry</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="event__right d-sm-flex align-items-center">
                                <div class="event__time">
                              <span>
                                 <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.75 7.50024C13.75 10.9502 10.95 13.7502 7.5 13.7502C4.05 13.7502 1.25 10.9502 1.25 7.50024C1.25 4.05024 4.05 1.25024 7.5 1.25024C10.95 1.25024 13.75 4.05024 13.75 7.50024Z"
                                        stroke="#258E46" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path
                                        d="M9.8188 9.48735L7.8813 8.3311C7.5438 8.1311 7.2688 7.64985 7.2688 7.2561V4.6936"
                                        stroke="#258E46" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                 </svg>
                                 10:30am - 12:30pm
                              </span>
                                </div>
                                <div class="event__more ml-30">
                                    <a href="event-details.html" class="tp-btn-5 tp-btn-7">View Events </a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="event__item white-bg mb-10 transition-3 p-relative d-lg-flex align-items-center justify-content-between">
                            <div class="event__left d-sm-flex align-items-center">
                                <div class="event__date">
                                    <h4>06</h4>
                                    <p>August, 2022</p>
                                </div>
                                <div class="event__content">
                                    <div class="event__meta">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M8.49992 9.51253C9.72047 9.51253 10.7099 8.52308 10.7099 7.30253C10.7099 6.08198 9.72047 5.09253 8.49992 5.09253C7.27937 5.09253 6.28992 6.08198 6.28992 7.30253C6.28992 8.52308 7.27937 9.51253 8.49992 9.51253Z"
                                                            stroke="#5F6160" stroke-width="1.5"/>
                                                        <path
                                                            d="M2.56416 6.01334C3.95958 -0.120822 13.0475 -0.113738 14.4358 6.02043C15.2504 9.61876 13.0121 12.6646 11.05 14.5488C9.62625 15.9229 7.37375 15.9229 5.94291 14.5488C3.98791 12.6646 1.74958 9.61168 2.56416 6.01334Z"
                                                            stroke="#5F6160" stroke-width="1.5"/>
                                                    </svg>
                                                    New York, US</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="event__title">
                                        <a href="event-details.html">University seminar series on global health.</a>
                                    </h3>

                                    <div class="event__person">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img src="{{asset("front/assets/img/event/event-person-1.jpg")}}"
                                                         alt="">
                                                    <img src="{{asset("front/assets/img/event/event-person-2.jpg")}}"
                                                         alt="">
                                                    <span>David Karry</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="event__right d-sm-flex align-items-center">
                                <div class="event__time">
                              <span>
                                 <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.75 7.50024C13.75 10.9502 10.95 13.7502 7.5 13.7502C4.05 13.7502 1.25 10.9502 1.25 7.50024C1.25 4.05024 4.05 1.25024 7.5 1.25024C10.95 1.25024 13.75 4.05024 13.75 7.50024Z"
                                        stroke="#258E46" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path
                                        d="M9.8188 9.48735L7.8813 8.3311C7.5438 8.1311 7.2688 7.64985 7.2688 7.2561V4.6936"
                                        stroke="#258E46" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                 </svg>
                                 11:00am - 12:00pm
                              </span>
                                </div>
                                <div class="event__more ml-30">
                                    <a href="event-details.html" class="tp-btn-5 tp-btn-7">View Events </a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="event__item white-bg mb-10 transition-3 p-relative d-lg-flex align-items-center justify-content-between">
                            <div class="event__left d-sm-flex align-items-center">
                                <div class="event__date">
                                    <h4>18</h4>
                                    <p>March, 2022</p>
                                </div>
                                <div class="event__content">
                                    <div class="event__meta">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M8.49992 9.51253C9.72047 9.51253 10.7099 8.52308 10.7099 7.30253C10.7099 6.08198 9.72047 5.09253 8.49992 5.09253C7.27937 5.09253 6.28992 6.08198 6.28992 7.30253C6.28992 8.52308 7.27937 9.51253 8.49992 9.51253Z"
                                                            stroke="#5F6160" stroke-width="1.5"/>
                                                        <path
                                                            d="M2.56416 6.01334C3.95958 -0.120822 13.0475 -0.113738 14.4358 6.02043C15.2504 9.61876 13.0121 12.6646 11.05 14.5488C9.62625 15.9229 7.37375 15.9229 5.94291 14.5488C3.98791 12.6646 1.74958 9.61168 2.56416 6.01334Z"
                                                            stroke="#5F6160" stroke-width="1.5"/>
                                                    </svg>
                                                    New York, US</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="event__title">
                                        <a href="event-details.html">Virtual spring part-time jobs fair for student.</a>
                                    </h3>

                                    <div class="event__person">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img src="{{asset("front/assets/img/event/event-person-1.jpg")}}"
                                                         alt="">
                                                    <img src="{{asset("front/assets/img/event/event-person-2.jpg")}}"
                                                         alt="">
                                                    <span>David Karry</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="event__right d-sm-flex align-items-center">
                                <div class="event__time">
                              <span>
                                 <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.75 7.50024C13.75 10.9502 10.95 13.7502 7.5 13.7502C4.05 13.7502 1.25 10.9502 1.25 7.50024C1.25 4.05024 4.05 1.25024 7.5 1.25024C10.95 1.25024 13.75 4.05024 13.75 7.50024Z"
                                        stroke="#258E46" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path
                                        d="M9.8188 9.48735L7.8813 8.3311C7.5438 8.1311 7.2688 7.64985 7.2688 7.2561V4.6936"
                                        stroke="#258E46" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                 </svg>
                                 09:45am - 11:30pm
                              </span>
                                </div>
                                <div class="event__more ml-30">
                                    <a href="event-details.html" class="tp-btn-5 tp-btn-7">View Events </a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="event__item white-bg mb-10 transition-3 p-relative d-lg-flex align-items-center justify-content-between">
                            <div class="event__left d-sm-flex align-items-center">
                                <div class="event__date">
                                    <h4>27</h4>
                                    <p>October, 2022</p>
                                </div>
                                <div class="event__content">
                                    <div class="event__meta">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M8.49992 9.51253C9.72047 9.51253 10.7099 8.52308 10.7099 7.30253C10.7099 6.08198 9.72047 5.09253 8.49992 5.09253C7.27937 5.09253 6.28992 6.08198 6.28992 7.30253C6.28992 8.52308 7.27937 9.51253 8.49992 9.51253Z"
                                                            stroke="#5F6160" stroke-width="1.5"/>
                                                        <path
                                                            d="M2.56416 6.01334C3.95958 -0.120822 13.0475 -0.113738 14.4358 6.02043C15.2504 9.61876 13.0121 12.6646 11.05 14.5488C9.62625 15.9229 7.37375 15.9229 5.94291 14.5488C3.98791 12.6646 1.74958 9.61168 2.56416 6.01334Z"
                                                            stroke="#5F6160" stroke-width="1.5"/>
                                                    </svg>
                                                    New York, US</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="event__title">
                                        <a href="event-details.html">Scottish creatives to receive funded business.</a>
                                    </h3>

                                    <div class="event__person">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img src="{{asset("front/assets/img/event/event-person-1.jpg")}}"
                                                         alt="">
                                                    <img src="{{asset("front/assets/img/event/event-person-2.jpg")}}"
                                                         alt="">
                                                    <span>David Karry</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="event__right d-sm-flex align-items-center">
                                <div class="event__time">
                              <span>
                                 <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.75 7.50024C13.75 10.9502 10.95 13.7502 7.5 13.7502C4.05 13.7502 1.25 10.9502 1.25 7.50024C1.25 4.05024 4.05 1.25024 7.5 1.25024C10.95 1.25024 13.75 4.05024 13.75 7.50024Z"
                                        stroke="#258E46" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path
                                        d="M9.8188 9.48735L7.8813 8.3311C7.5438 8.1311 7.2688 7.64985 7.2688 7.2561V4.6936"
                                        stroke="#258E46" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                 </svg>
                                 04:00pm - 06:30pm
                              </span>
                                </div>
                                <div class="event__more ml-30">
                                    <a href="event-details.html" class="tp-btn-5 tp-btn-7">View Events </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- event area end -->

        <!-- team area start -->
        <section class="team__area pt-115">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="section__title-wrapper-2 mb-40">
                            <span class="section__title-pre-2">Top Instructors</span>
                            <h3 class="section__title-2">Become A Instruction Instructor.</h3>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="team__wrapper mb-45 pl-70">
                            <p>Placerat veritatis ullamco rutrum quia illo, aenean eaque necessitatibus aptent vehicula
                                porta? Sollicitudin id, laboris commodi! </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="team__item text-center mb-40">
                            <div class="team__thumb">
                                <div class="team__shape">
                                    <img src="{{asset("front/assets/img/team/team-shape-1.png")}}" alt="">
                                </div>
                                <img src="{{asset("front/assets/img/team/team-1.png")}}" alt="">
                                <div class="team__social transition-3">
                                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="team__content">
                                <h3 class="team__title">
                                    <a href="team-details.html">Melissa Jones</a>
                                </h3>
                                <span class="team__designation">Professor</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="team__item text-center mb-40">
                            <div class="team__thumb">
                                <div class="team__shape">
                                    <img src="{{asset("front/assets/img/team/team-shape-2.png")}}" alt="">
                                </div>
                                <img src="{{asset("front/assets/img/team/team-2.png")}}" alt="">
                                <div class="team__social transition-3">
                                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="team__content">
                                <h3 class="team__title">
                                    <a href="team-details.html">Morgan Key</a>
                                </h3>
                                <span class="team__designation">Teacher MBA</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="team__item text-center mb-40">
                            <div class="team__thumb">
                                <div class="team__shape">
                                    <img src="{{asset("front/assets/img/team/team-shape-3.png")}}" alt="">
                                </div>
                                <img src="{{asset("front/assets/img/team/team-3.png")}}" alt="">
                                <div class="team__social transition-3">
                                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="team__content">
                                <h3 class="team__title">
                                    <a href="team-details.html">Andra Flatcher </a>
                                </h3>
                                <span class="team__designation">Lead Teacher</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="team__item text-center mb-40">
                            <div class="team__thumb">
                                <div class="team__shape">
                                    <img src="{{asset("front/assets/img/team/team-shape-4.png")}}" alt="">
                                </div>
                                <img src="{{asset("front/assets/img/team/team-4.png")}}" alt="">
                                <div class="team__social transition-3">
                                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="team__content">
                                <h3 class="team__title">
                                    <a href="team-details.html">Oliver Porter</a>
                                </h3>
                                <span class="team__designation">Photogrepher</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- team area end -->

        <!-- testimonial area start -->
        <section class="testimonial__area pt-80 pb-120 fix">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="section__title-wrapper-2 mb-40 text-center">
                            <span class="section__title-pre-2">Testimonials</span>
                            <h3 class="section__title-2">What our Customers Say.</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="testimonial__slider">
                            <div class="testimonial__active owl-carousel">
                                <div class="testimonial__item transition-3 text-center white-bg">
                                    <div class="testimonial__avater">
                                        <img src="{{asset("front/assets/img/testimonial/testimonial-1.jpg")}}" alt="">
                                    </div>
                                    <div class="testimonial__text">
                                        <h4>Great quality!</h4>
                                        <p>Lorem ipsum dolor sit amet, consectet adipiscing elit. Phasellus feugiat
                                            lacus
                                            vitae neque ornare.</p>
                                    </div>
                                    <div class="testimonial__avater-info mb-5">
                                        <h3>Dianne Ameter</h3>
                                        <span>UX Designer</span>
                                    </div>
                                    <div class="testimonial__rating">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="testimonial__item transition-3 text-center white-bg">
                                    <div class="testimonial__avater">
                                        <img src="{{asset("front/assets/img/testimonial/testimonial-2.jpg")}}" alt="">
                                    </div>
                                    <div class="testimonial__text">
                                        <h4>Code Quality!</h4>
                                        <p>Lorem ipsum dolor sit amet, consectet adipiscing elit. Phasellus feugiat
                                            lacus
                                            vitae neque ornare.</p>
                                    </div>
                                    <div class="testimonial__avater-info mb-5">
                                        <h3>Douglas Lyphe</h3>
                                        <span>Devolopment</span>
                                    </div>
                                    <div class="testimonial__rating">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="testimonial__item transition-3 text-center white-bg">
                                    <div class="testimonial__avater">
                                        <img src="{{asset("front/assets/img/testimonial/testimonial-3.jpg")}}" alt="">
                                    </div>
                                    <div class="testimonial__text">
                                        <h4>Customer Support</h4>
                                        <p>Lorem ipsum dolor sit amet, consectet adipiscing elit. Phasellus feugiat
                                            lacus
                                            vitae neque ornare.</p>
                                    </div>
                                    <div class="testimonial__avater-info mb-5">
                                        <h3>Russell Sprout</h3>
                                        <span>IT Specialist</span>
                                    </div>
                                    <div class="testimonial__rating">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="testimonial__item transition-3 text-center white-bg">
                                    <div class="testimonial__avater">
                                        <img src="{{asset("front/assets/img/testimonial/testimonial-4.jpg")}}" alt="">
                                    </div>
                                    <div class="testimonial__text">
                                        <h4>Good Product</h4>
                                        <p>Lorem ipsum dolor sit amet, consectet adipiscing elit. Phasellus feugiat
                                            lacus
                                            vitae neque ornare.</p>
                                    </div>
                                    <div class="testimonial__avater-info mb-5">
                                        <h3>Shahnewaz Sakil</h3>
                                        <span>Developer</span>
                                    </div>
                                    <div class="testimonial__rating">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial area end -->

        <!-- brand area start -->
        <section class="brand__area pt-40 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-4 col-xl-4 col-lg-4">
                        <div class="brand__wrapper">
                            <div class="section__title-wrapper-2">
                                <span class="section__title-pre-2">Testimonials</span>
                                <h3 class="section__title-2 section__title-2-30">Who will you learn with?</h3>
                            </div>
                            <p>You can list your partners or instructors's brands here to show off your site's
                                reputation</p>
                            <div class="brand__btn">
                                <a href="about.html" class="tp-btn-5 tp-btn-6">View all partners</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8 col-xl-8 col-lg-8">
                        <div class="brand__item-wrapper pl-100">
                            <div class="row align-items-center">
                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                                    <div class="brand__item text-center m-img mb-40">
                                        <img src="{{asset("front/assets/img/brand/brand-1.png")}}" alt="">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                                    <div class="brand__item text-center m-img mb-40">
                                        <img src="{{asset("front/assets/img/brand/brand-2.png")}}" alt="">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                                    <div class="brand__item text-center m-img mb-40">
                                        <img src="{{asset("front/assets/img/brand/brand-3.png")}}" alt="">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                                    <div class="brand__item text-center m-img mb-40">
                                        <img src="{{asset("front/assets/img/brand/brand-4.png")}}" alt="">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                                    <div class="brand__item text-center m-img mb-40">
                                        <img src="{{asset("front/assets/img/brand/brand-5.png")}}" alt="">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                                    <div class="brand__item text-center m-img mb-40">
                                        <img src="{{asset("front/assets/img/brand/brand-6.png")}}" alt="">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                                    <div class="brand__item text-center m-img mb-40">
                                        <img src="{{asset("front/assets/img/brand/brand-7.png")}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- brand area end -->

    </main>
@endsection
