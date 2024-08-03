@extends('front.layout.app')

@section('title', 'Ana Sayfa')
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
                 data-background="{{asset("front/assets/img/slider/2/slider-2-bg.jpg")}}">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xxl-6 col-lg-6">
                        <div class="slider__content-2 mt-30">
                            <span>{{$language["slider_ust_bilgi_yazisi"]}}</span>
                            <h3 class="slider__title-2">{{$language["slider_ana_bilgi_yazisi"]}}</h3>
                            <p>{{$language["slider_alt_bilgi_yazisi"]}}</p>
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
                                    <img class="slider__shape-4"
                                         src="{{$image["slider_resim"] ?? \App\Service\Helper::getNoImage()}}"
                                         alt="slider">
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
                                    class="section__title-pre-2">{{$language["kategori_ust_bilgi_yazisi"]}}</span>
                                <h3 class="section__title-2 section__title-2-30">{{$language["kategori_ana_bilgi_yazisi"]}}</h3>
                            </div>
                            <p>{{$language["kategori_alt_bilgi_yazisi"]}}</p>
                        </div>
                    </div>
                    <div class="col-xxl-8 col-xl-8 col-lg-8">
                        <div class="category__item-wrapper">
                            <div class="row">
                                @foreach($courses as $course)
                                    @if($course["category_status"] == 1)
                                        <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
                                            <div class="category__item text-center mb-45">
                                                <div class="category__icon {{\App\Service\Helper::randColor()}}">
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
                                    class="section__title-pre-2">{{$language["arastirma_ust_bilgi_yazisi"]}}</span>
                                <h3 class="section__title-2">{{$language["arastirma_ana_bilgi_yazisi"]}}</h3>
                            </div>
                            <p>{{$language["arastirma_alt_bilgi_yazisi"]}}</p>
                            <div class="research__btn-2 mb-70">
                                <a href="contact.html" class="tp-btn-5 tp-btn-6">Şimdi Keşfet</a>
                            </div>

                            <div class="research__download">
                                <div class="research__download-bg include-bg">
                                    <img src="{{$image["arastirma_resim"] ?? \App\Service\Helper::getNoImage()}}"
                                         style="max-width: 544px; max-height: 200px"
                                         alt="arastirma">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-5 offset-xxl-1 col-xl-5 offset-xl-1 col-lg-6">
                        <div class="research__features-wrapper pt-35">
                            <div class="research__features-item d-sm-flex align-items-start mb-40">
                                <div class="research__features-icon mr-25">
                              <span>
                                <svg width="27" height="27" viewBox="0 0 27 27" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M26 13.9961V15.1656C26 19.8436 24.8875 21 20.45 21H6.55C2.1125 21 1 19.8305 1 15.1656V6.83443C1 2.16951 2.1125 1 6.55 1H8.5"
                                        stroke="#6151FB" stroke-width="1.6" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M13.5 21.5V25.5" stroke="#6151FB" stroke-width="1.6" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M1 14.75H26" stroke="#6151FB" stroke-width="1.6" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M7.875 26H19.125" stroke="#6151FB" stroke-width="1.6"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                    <path
                                        d="M20.825 10.2127H14.875C13.15 10.2127 12.575 9.0627 12.575 7.9127V3.5127C12.575 2.1377 13.7 1.0127 15.075 1.0127H20.825C22.1 1.0127 23.125 2.0377 23.125 3.31269V7.9127C23.125 9.1877 22.1 10.2127 20.825 10.2127Z"
                                        stroke="#6151FB" stroke-width="1.6" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path
                                        d="M24.6375 8.39985L23.125 7.33735V3.88735L24.6375 2.82485C25.3875 2.31235 26 2.62485 26 3.53735V7.69985C26 8.61235 25.3875 8.92485 24.6375 8.39985Z"
                                        stroke="#6151FB" stroke-width="1.6" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                 </svg>
                              </span>
                                </div>
                                <div class="research__features-content">
                                    <h4>{{$language["arastirma_bilgi_baslik_1"]}}</h4>
                                    <p>{{$language["arastirma_bilgi_aciklama_1"]}}</p>
                                </div>
                            </div>
                            <div class="research__features-item d-sm-flex align-items-start mb-40">
                                <div class="research__features-icon mr-25">
                              <span class="yellow-bg">
                                <svg width="28" height="27" viewBox="0 0 28 27" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.4 19.746H6.47299C2.092 19.746 1 18.654 1 14.273V6.47299C1 2.092 2.092 1 6.47299 1H20.162C24.543 1 25.635 2.092 25.635 6.47299"
                                        stroke="#F4930E" stroke-width="1.7" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M11.3999 25.6218V19.7458" stroke="#F4930E" stroke-width="1.7"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M1 14.5459H11.4" stroke="#F4930E" stroke-width="1.7" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M7.16211 25.6218H11.4001" stroke="#F4930E" stroke-width="1.7"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                    <path
                                        d="M26.9999 14.3509V21.7739C26.9999 24.8549 26.2329 25.6219 23.152 25.6219H18.537C15.456 25.6219 14.689 24.8549 14.689 21.7739V14.3509C14.689 11.2699 15.456 10.5029 18.537 10.5029H23.152C26.2329 10.5029 26.9999 11.2699 26.9999 14.3509Z"
                                        stroke="#F4930E" stroke-width="1.7" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M20.8179 21.4359H20.8296" stroke="#F4930E" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                 </svg>
                              </span>
                                </div>
                                <div class="research__features-content">
                                    <h4>{{$language["arastirma_bilgi_baslik_2"]}}</h4>
                                    <p>{{$language["arastirma_bilgi_aciklama_2"]}}</p>
                                </div>
                            </div>
                            <div class="research__features-item d-sm-flex align-items-start">
                                <div class="research__features-icon mr-25">
                              <span class="green-bg">
                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.6185 23.8234H7.24516C3.5585 23.8234 2.3335 21.3734 2.3335 18.9118V9.08842C2.3335 5.40176 3.5585 4.17676 7.24516 4.17676H14.6185C18.3052 4.17676 19.5302 5.40176 19.5302 9.08842V18.9118C19.5302 22.5984 18.2935 23.8234 14.6185 23.8234Z"
                                        stroke="#20AD96" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path
                                        d="M22.7736 19.9502L19.5303 17.6752V10.3135L22.7736 8.03849C24.3603 6.93015 25.6669 7.60682 25.6669 9.55515V18.4452C25.6669 20.3935 24.3603 21.0702 22.7736 19.9502Z"
                                        stroke="#20AD96" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path
                                        d="M13.4165 12.8345C14.383 12.8345 15.1665 12.051 15.1665 11.0845C15.1665 10.118 14.383 9.33447 13.4165 9.33447C12.45 9.33447 11.6665 10.118 11.6665 11.0845C11.6665 12.051 12.45 12.8345 13.4165 12.8345Z"
                                        stroke="#20AD96" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                 </svg>
                              </span>
                                </div>
                                <div class="research__features-content">
                                    <h4>{{$language["arastirma_bilgi_baslik_3"]}}</h4>
                                    <p>{{$language["arastirma_bilgi_aciklama_3"]}}</p>
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
