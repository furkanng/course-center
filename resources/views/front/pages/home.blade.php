@extends('front.layout.app')

@section('title', env("APP_NAME"))
@section('content')
    <!-- slider area start -->
    <section class="slider__area">
        <div class="slider__active swiper-container">
            <div class="swiper-wrapper">
                <div
                    class="slider__item p-relative slider__height slider__height-3 d-flex align-items-center z-index-1"
                    style="width: 100%; height: 100%">
                    <div class="slider__bg slider__overlay include-bg"
                         data-background="{{$image["slider_resim"]}}"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-10 col-sm-10">
                                <div class="slider__content-3 p-relative z-index-1">
                                 <span>
                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.745 0.4425C9.435 -0.1475 10.565 -0.1475 11.265 0.4425L12.845 1.8025C13.145 2.0625 13.705 2.2725 14.105 2.2725H15.805C16.865 2.2725 17.735 3.1425 17.735 4.2025V5.9025C17.735 6.2925 17.945 6.8625 18.205 7.1625L19.565 8.7425C20.155 9.4325 20.155 10.5625 19.565 11.2625L18.205 12.8425C17.945 13.1425 17.735 13.7025 17.735 14.1025V15.8025C17.735 16.8625 16.865 17.7325 15.805 17.7325H14.105C13.715 17.7325 13.145 17.9425 12.845 18.2025L11.265 19.5625C10.575 20.1525 9.445 20.1525 8.745 19.5625L7.165 18.2025C6.865 17.9425 6.305 17.7325 5.905 17.7325H4.175C3.115 17.7325 2.245 16.8625 2.245 15.8025V14.0925C2.245 13.7025 2.035 13.1425 1.785 12.8425L0.435 11.2525C-0.145 10.5625 -0.145 9.4425 0.435 8.7525L1.785 7.1625C2.035 6.8625 2.245 6.3025 2.245 5.9125V4.1925C2.245 3.1325 3.115 2.2625 4.175 2.2625H5.905C6.295 2.2625 6.865 2.0525 7.165 1.7925L8.745 0.4425Z"
                                        fill="#FF8D00"/>
                                    <path d="M6.375 9.99251L8.785 12.4125L13.615 7.57251" stroke="white"
                                          stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    {{$language["text_4"]}}</span>
                                    <h2 class="slider__title-3">
                                        {{$language["text_5"]}}</h2>

                                    <div class="mb-20">
                                        <form action="{{ route('front.company.index') }}" method="GET">
                                            <div class="slider__search-input p-relative">
                                                <input type="text" name="search" placeholder="{{$language["text_6"]}}">
                                                <button type="submit">Ara</button>
                                                <div class="slider__search-input-icon">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M8.625 15.75C12.56 15.75 15.75 12.56 15.75 8.625C15.75 4.68997 12.56 1.5 8.625 1.5C4.68997 1.5 1.5 4.68997 1.5 8.625C1.5 12.56 4.68997 15.75 8.625 15.75Z"
                                                            stroke="#828282" stroke-width="1.5"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"/>
                                                        <path d="M16.5 16.5L15 15" stroke="#828282" stroke-width="1.5"
                                                              stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="slider__list">
                                        <ul>
                                            <li><i class="fa-solid fa-check"></i>{{$language["text_7"]}}
                                            </li>
                                            <li><i class="fa-solid fa-check"></i>{{$language["text_8"]}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- slider area end -->

    <section class="certificate__area pb-60 pt-60">
        <div class="container">
            <div class="certificate__inner grey-bg-9 p-relative">
                <div class="certificate__thumb">
                    <img style="width: 523px; height: 400px" src="https://hangiderslig.com/storage/company_images/173559394695.jpeg" alt="">
                </div>
                <div class="row">
                    <div class="col-xxl-7">
                        <div class="certificate__content">
                            <div class="section__title-wrapper mb-10">
                                <span class="section__title-pre-3">{{$language["text_20"]}}</span>
                                <h2 class="section__title section__title-44">ÖZEL KURSOLOJİ ÖZEL ÖĞRETİM KURSU</h2>
                            </div>
                            <p>Tüm sınavlara hazırlık bizden yapılır</p>
                            <div class="certificate__links d-sm-flex align-items-center">
                                <a href="https://www.youtube.com/watch?v=4XGLPTtn4xQ" class="play-video popup-video"><i class="fa-solid fa-eye"></i>İncele</a>

                                <ul>
                                    <li><a href="tel:+905511074559">Bize Ulaşın</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="category__area pt-105 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-4">
                    <div class="category__wrapper">
                        <div class="section__title-wrapper-2">
                            <span class="section__title-pre-2">Kategoriler</span>
                            <h3 class="section__title-2 section__title-2-30">{{$language["text_9"]}}</h3>
                        </div>
                        <p>{{$language["text_10"]}}</p>
                        <div class="category__btn">
                            <a href="{{route("front.company.index")}}" class="tp-btn-5">{{$language["text_11"]}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="category__item-wrapper">
                        <div class="row">
                            @foreach($courses as $course)
                                @if($course->category_status)
                                    <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
                                        <div class="category__item text-center mb-45">
                                            <div class="category__icon">
                                                <a href="{{route('front.company.index',["courses"=> [$course->name]])}}">
                                                    {!! $course->icons !!}
                                                </a>
                                            </div>
                                            <div class="category__content">
                                                <h4 class="category__title">
                                                    <a href="{{route('front.company.index',["courses"=> [$course->name]])}}">
                                                        {{$course->name}}
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
                                <div class="category__item text-center mb-45">
                                    <div class="category__icon add">
                                        <a href="{{route("front.company.index")}}">+</a>
                                    </div>
                                    <div class="category__content">
                                        <h4 class="category__title add">
                                            <a href="{{route("front.company.index")}}">Daha Fazla</a>
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

    <!-- course area start -->
    <section class="course__area pt-60 pb-80 grey-bg-4">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="section__title-wrapper mb-60 text-center">
                        <h3 class="section__title-2 section__title-2-30">{{$language["text_15"]}}</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xxl-12">
                    <div class="tab-content course__tab-content" id="course-tabContent">
                        <div class="tab-pane fade show active" id="nav-all" role="tabpanel"
                             aria-labelledby="nav-all-tab">
                            <div class="course__tab-wrapper">
                                <div class="row">
                                    @foreach($previewCompanies as $company)
                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                                            <div class="course__item-2 transition-3 white-bg mb-30 fix">
                                                <a href="{{$company->link}}">
                                                    <div class="course__thumb-2 w-img fix">
                                                        @if($company->image)
                                                            <img src="{{$company->image_url}}" alt="">
                                                        @else
                                                            <img src="{{ asset("images/noImage2.webp") }}" alt="">
                                                        @endif
                                                    </div>
                                                </a>
                                                <div class="course__content-2">
                                                    <div class="course__top-2 d-flex align-items-center">
                                                        @if(count($company->courses) > 0)
                                                            @foreach($company->courses->take(5) as $course)
                                                                <div
                                                                    class="course__tag-2 mr-10 {{ \App\Service\Helper::randColor() }}">
                                                                    <a>{{ strtoupper($course->name) }}</a>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    <h3 class="mt-auto">
                                                        <a href="{{$company->link}}">
                                                            <span style="font-size: medium">{{$company->name}}</span>
                                                        </a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row justify-content-center">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div
                        class="course__enroll-wrapper mt-40 p-relative d-sm-flex align-items-center justify-content-between include-bg"
                        data-background="{{asset("front/assets/img/course/bg/course-bg.png")}}">
                        <div class="course__enroll-icon">
                           <span>
                              <svg width="28" height="34" viewBox="0 0 28 34" fill="none"
                                   xmlns="http://www.w3.org/2000/svg">
                                 <g filter="url(#filter0_d_268_615)">
                                 <path
                                     d="M7.59649 15.161H11.2015V23.561C11.2015 25.521 12.2632 25.9177 13.5582 24.4477L22.3898 14.4144C23.4748 13.1894 23.0198 12.1744 21.3748 12.1744H17.7698V3.77435C17.7698 1.81435 16.7082 1.41769 15.4132 2.88769L6.58149 12.921C5.50816 14.1577 5.96316 15.161 7.59649 15.161Z"
                                     fill="white"/>
                                 </g>
                                 <defs>
                                 <filter id="filter0_d_268_615" x="2" y="2" width="24.9795" height="31.3354"
                                         filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                 <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                 <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                 <feOffset dy="4"/>
                                 <feGaussianBlur stdDeviation="2"/>
                                 <feComposite in2="hardAlpha" operator="out"/>
                                 <feColorMatrix type="matrix"
                                                values="0 0 0 0 0.825 0 0 0 0 0.38207 0 0 0 0 0 0 0 0 0.5 0"/>
                                 <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_268_615"/>
                                 <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_268_615"
                                          result="shape"/>
                                 </filter>
                                 </defs>
                                 </svg>
                           </span>
                        </div>
                        <div class="course__enroll-content">
                            <p>{{$language["text_12"]}}</p>
                            <h4>{{$language["text_13"]}}</h4>
                        </div>
                        <div class="course__enroll-btn pt-5">
                            <a href="tel:+905511074559" class="tp-btn-5 tp-btn-11">{{$language["text_14"]}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- course area
    <section class="category__area pt-105 pb-70">
        <div class="container">

            <x-front-banner/>
        </div>
    </section>
    -->
@endsection
