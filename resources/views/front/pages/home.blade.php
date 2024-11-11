@extends('front.layout.app')

@section('title', 'Ana Sayfa')
@section('content')
    <!-- slider area start -->
    <section class="slider__area">
        <div class="slider__active swiper-container">
            <div class="swiper-wrapper">
                <div
                    class="slider__item swiper-slide p-relative slider__height slider__height-3 d-flex align-items-center z-index-1">
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

                                    <div class="slider__search mb-20">
                                        <form action="#">
                                            <div class="slider__search-input p-relative">
                                                <input type="text" placeholder="{{$language["text_6"]}}">
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
                            <a href="course-v1.html" class="tp-btn-5">{{$language["text_11"]}}</a>
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
                                            <div class="category__icon {{\App\Service\Helper::randColor()}}">
                                                <a href="{{$course->link}}">
                                                    {!! \App\Service\Helper::randSvg() !!}
                                                </a>
                                            </div>
                                            <div class="category__content">
                                                <h4 class="category__title">
                                                    <a href="{{$course->link}}">{{$course->name}}</a>
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
                                            <a href="course-v1.html">Daha Fazla</a>
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
                                                <div class="course__thumb-2 w-img fix">
                                                    <a href="{{$company->link}}">
                                                        @if($company->image)
                                                            <img src="{{$company->image_url}}" alt="">
                                                        @else
                                                            <img src="{{ asset("images/noImage2.webp") }}" alt="">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="course__content-2">
                                                    <div
                                                        class="course__top-2 d-flex align-items-center">
                                                        @if(count($company->courses) > 0)
                                                            @foreach($company->courses as $course)
                                                                <div
                                                                    class="course__tag-2 mr-10 {{\App\Service\Helper::randColor()}}">
                                                                    <a>{{strtoupper($course->name)}}</a>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    <h3 class="course__title-2">
                                                        <a href="{{$company->link}}">{{$company->name}}</a>
                                                    </h3>
                                                    <div
                                                        class="course__bottom-2 d-flex align-items-center justify-content-between">
                                                        <div class="course__action">
                                                            <ul>
                                                                <li>
                                                                    <div
                                                                        class="course__action-item d-flex align-items-center">
                                                                        <div class="course__action-icon mr-5">
                                                            <span>
                                                               <svg width="10" height="12" viewBox="0 0 10 12"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                  <path
                                                                      d="M5.00004 5.5833C6.28592 5.5833 7.32833 4.5573 7.32833 3.29165C7.32833 2.02601 6.28592 1 5.00004 1C3.71416 1 2.67175 2.02601 2.67175 3.29165C2.67175 4.5573 3.71416 5.5833 5.00004 5.5833Z"
                                                                      stroke="#5F6160" stroke-width="1.5"
                                                                      stroke-linecap="round"
                                                                      stroke-linejoin="round"/>
                                                                  <path
                                                                      d="M9 11.0001C9 9.22632 7.20722 7.79175 5 7.79175C2.79278 7.79175 1 9.22632 1 11.0001"
                                                                      stroke="#5F6160" stroke-width="1.5"
                                                                      stroke-linecap="round"
                                                                      stroke-linejoin="round"/>
                                                               </svg>
                                                            </span>
                                                                        </div>
                                                                        <div class="course__action-content">
                                                                            <span>4.2k</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div
                                                                        class="course__action-item d-flex align-items-center">
                                                                        <div class="course__action-icon mr-5">
                                                            <span>
                                                               <svg width="14" height="12" viewBox="0 0 14 12"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                  <path
                                                                      d="M9.01232 5.95416C9.01232 7.06709 8.11298 7.96642 7.00006 7.96642C5.88713 7.96642 4.98779 7.06709 4.98779 5.95416C4.98779 4.84123 5.88713 3.94189 7.00006 3.94189C8.11298 3.94189 9.01232 4.84123 9.01232 5.95416Z"
                                                                      stroke="#5F6160" stroke-width="1.3"
                                                                      stroke-linecap="round"
                                                                      stroke-linejoin="round"/>
                                                                  <path
                                                                      d="M7 10.6026C8.98416 10.6026 10.8334 9.43342 12.1206 7.40991C12.6265 6.61737 12.6265 5.28523 12.1206 4.49269C10.8334 2.46919 8.98416 1.30005 7 1.30005C5.01584 1.30005 3.16658 2.46919 1.87941 4.49269C1.37353 5.28523 1.37353 6.61737 1.87941 7.40991C3.16658 9.43342 5.01584 10.6026 7 10.6026Z"
                                                                      stroke="#5F6160" stroke-width="1.3"
                                                                      stroke-linecap="round"
                                                                      stroke-linejoin="round"/>
                                                               </svg>
                                                            </span>
                                                                        </div>
                                                                        <div class="course__action-content">
                                                                            <span>44k</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div
                                                                        class="course__action-item d-flex align-items-center">
                                                                        <div class="course__action-icon mr-5">
                                                            <span>
                                                               <svg width="12" height="12" viewBox="0 0 12 12"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                  <path
                                                                      d="M6.86447 1.72209L7.74447 3.49644C7.86447 3.74343 8.18447 3.98035 8.45447 4.02572L10.0495 4.29288C11.0695 4.46426 11.3095 5.2103 10.5745 5.94625L9.33447 7.19636C9.12447 7.40807 9.00947 7.81637 9.07447 8.10873L9.42947 9.65625C9.70947 10.8812 9.06447 11.355 7.98947 10.7148L6.49447 9.82259C6.22447 9.66129 5.77947 9.66129 5.50447 9.82259L4.00947 10.7148C2.93947 11.355 2.28947 10.8761 2.56947 9.65625L2.92447 8.10873C2.98947 7.81637 2.87447 7.40807 2.66447 7.19636L1.42447 5.94625C0.694466 5.2103 0.929466 4.46426 1.94947 4.29288L3.54447 4.02572C3.80947 3.98035 4.12947 3.74343 4.24947 3.49644L5.12947 1.72209C5.60947 0.759304 6.38947 0.759304 6.86447 1.72209Z"
                                                                      stroke="#5F6160" stroke-width="1.3"
                                                                      stroke-linecap="round"
                                                                      stroke-linejoin="round"/>
                                                               </svg>
                                                            </span>
                                                                        </div>
                                                                        <div class="course__action-content">
                                                                            <span>5.0</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
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
                            <a href="contact.html" class="tp-btn-5 tp-btn-11">{{$language["text_14"]}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- course area end -->

@endsection
