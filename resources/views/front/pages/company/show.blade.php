@extends('front.layout.app')

@section('title', 'Profilim')
@section('content')
    <section class="course__area pt-30 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="course__wrapper">
                        <div class="page__title-content mb-25">
                            <div class="breadcrumb__list breadcrumb__list-2 mb-10">
                                <span><a href="{{route("home")}}">Ana Sayfa</a></span>
                                <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
                                <span>Dershaneler</span>
                                <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
                                <span>{{$company->name}}</span>
                            </div>
                            @foreach($company->courses as $course)
                                <span class="breadcrumb__title-pre">{{strtoupper($course->name)}}</span>
                            @endforeach
                            <h5 class="breadcrumb__title-2">{{ mb_strtoupper($company->name, 'UTF-8') }}</h5>
                        </div>
                        <div class="course__meta-2 d-sm-flex align-items-center mb-30">
                            <div class="course__teacher-3 d-flex align-items-center mr-70 mb-30">
                                <div class="course__teacher-info-3">
                                    <h5>Kurum Türü</h5>
                                    <p>{{$company->getCompanyTypeName()}}</p>
                                </div>
                            </div>
                            <div class="course__update mr-80 mb-30">
                                <h5>Son Hareketler:</h5>
                                <p>{{ $company->updated_at->format('Y-m-d') }}</p>
                            </div>
                            <div class="course__rating-2 mb-30">
                                <h5>Puan:</h5>
                                <div class="course__rating-inner d-flex align-items-center">
                                    <ul>
                                        <li><a href="#"><i class="fa-solid fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa-solid fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa-solid fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa-solid fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa-solid fa-star"></i></a></li>
                                    </ul>
                                    <p>4.5</p>
                                </div>
                            </div>
                        </div>
                        @if(count($company->images) == 0)
                            <div class="course__img w-img mb-30">
                                <img src="{{\App\Service\Helper::getNoImage()}}" style="width: 770px; height: 450px"
                                     alt="">
                            </div>
                        @else
                            <div class="swiper-container course__img mb-30">
                                <div class="swiper-wrapper">
                                    @foreach($company->images as $companyImage)
                                        <div class="swiper-slide">
                                            <img src="{{ $companyImage->image_url }}" alt="image">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-pagination"></div>
                            </div>
                        @endif


                        <div class="course__tab-2 mb-45">
                            <ul class="nav nav-tabs" id="courseTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                            data-bs-target="#description" type="button" role="tab"
                                            aria-controls="description" aria-selected="true"><i
                                            class="fa-regular fa-medal"></i> <span>Genel Bilgiler</span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link " id="curriculum-tab" data-bs-toggle="tab"
                                            data-bs-target="#curriculum" type="button" role="tab"
                                            aria-controls="curriculum" aria-selected="false"><i
                                            class="fa-regular fa-book-blank"></i> <span>Soru Cevap</span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="review-tab" data-bs-toggle="tab"
                                            data-bs-target="#review" type="button" role="tab" aria-controls="review"
                                            aria-selected="false"><i class="fa-regular fa-star"></i>
                                        <span>Yorumlar</span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="member-tab" data-bs-toggle="tab"
                                            data-bs-target="#member" type="button" role="tab" aria-controls="member"
                                            aria-selected="false"><i class="fal fa-user"></i> <span>Fiyat Bilgisi</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="course__tab-content mb-95">
                            <div class="tab-content" id="courseTabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel"
                                     aria-labelledby="description-tab">
                                    <div class="course__description">
                                        <div class="mb-4">
                                            <h3>Kurum Hakkına</h3>
                                            {!! $company->info?->about ?? "Herhangi bir bilgi bulunmuyor" !!}
                                        </div>

                                        <div class="mb-4">
                                            <h3 class="mb-3">Kurum İmkanları</h3>
                                            @foreach($menuStructure as $mainMenu)
                                                <h6 class="font-weight-bold">{{ $mainMenu->name }}</h6>
                                                <div class="row mb-3">
                                                    @foreach($mainMenu->subMenus as $subMenu)
                                                        <div class="col-md-4 col-sm-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                       id="feature-{{ $subMenu->id }}"
                                                                       {{ in_array($subMenu->id, $companyFeatures) ? 'checked' : '' }} disabled>
                                                                <label class="font-weight-bolder"
                                                                       for="feature-{{ $subMenu->id }}">
                                                                    {{ $subMenu->name }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                        @if($company->info?->map)
                                            <div class="mb-4">
                                                <h3>Konum</h3>
                                                <div class="map-container"
                                                     style="position: relative; padding-bottom: 56.25%; overflow: hidden; width: 100%; height: 0;">
                                                    <iframe
                                                        src="{{$company->info?->map}}"
                                                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 1px solid gray;"
                                                        allowfullscreen="" loading="lazy"
                                                        referrerpolicy="no-referrer-when-downgrade">
                                                    </iframe>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="curriculum" role="tabpanel"
                                     aria-labelledby="curriculum-tab">
                                    <div class="course__curriculum">
                                        <div class="accordion" id="course__accordion">
                                            @foreach($company->sss as $index => $sss)
                                                <div class="accordion-item mb-20">
                                                    <h2 class="accordion-header" id="heading-{{ $index }}">
                                                        <button
                                                            class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}"
                                                            type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapse-{{ $index }}"
                                                            aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                                            aria-controls="collapse-{{ $index }}">
                                                            {{ $sss->question }}
                                                        </button>
                                                    </h2>
                                                    <div id="collapse-{{ $index }}"
                                                         class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                                         aria-labelledby="heading-{{ $index }}"
                                                         data-bs-parent="#course__accordion">
                                                        <div class="accordion-body">
                                                            <div
                                                                class="course__curriculum-content d-sm-flex justify-content-between align-items-center">
                                                                <div class="course__curriculum-info">
                                                                    <svg class="document" viewBox="0 0 24 24">
                                                                        <path class="st0"
                                                                              d="M14,2H6C4.9,2,4,2.9,4,4v16c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V8L14,2z"/>
                                                                        <polyline class="st0" points="14,2 14,8 20,8 "/>
                                                                        <line class="st0" x1="16" y1="13" x2="8"
                                                                              y2="13"/>
                                                                        <line class="st0" x1="16" y1="17" x2="8"
                                                                              y2="17"/>
                                                                        <polyline class="st0" points="10,9 9,9 8,9 "/>
                                                                    </svg>
                                                                    <h3>{{ $sss->answer }}</h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    <div class="course__review">

                                        <div class="course__review-rating mb-50">
                                            <div class="row g-0">
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                                    <div class="course__review-rating-info grey-bg-2 text-center">
                                                        <h5>5</h5>
                                                        <ul>
                                                            <li><a href="#"> <i class="fa-solid fa-star"></i> </a></li>
                                                            <li><a href="#"> <i class="fa-solid fa-star"></i> </a></li>
                                                            <li><a href="#"> <i class="fa-solid fa-star"></i> </a></li>
                                                            <li><a href="#"> <i class="fa-solid fa-star"></i> </a></li>
                                                            <li><a href="#"> <i class="fa-solid fa-star"></i> </a></li>
                                                        </ul>
                                                        <p>4 Ratings</p>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                                    <div class="course__review-details grey-bg-2">
                                                        <h5>Detailed Rating</h5>
                                                        <div class="course__review-content mb-20">
                                                            <div
                                                                class="course__review-item d-flex align-items-center justify-content-between">
                                                                <div class="course__review-text">
                                                                    <span>5 stars</span>
                                                                </div>
                                                                <div class="course__review-progress">
                                                                    <div class="single-progress"
                                                                         data-width="100%"></div>
                                                                </div>
                                                                <div class="course__review-percent">
                                                                    <h5>100%</h5>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course__review-item d-flex align-items-center justify-content-between">
                                                                <div class="course__review-text">
                                                                    <span>4 stars</span>
                                                                </div>
                                                                <div class="course__review-progress">
                                                                    <div class="single-progress" data-width="30%"></div>
                                                                </div>
                                                                <div class="course__review-percent">
                                                                    <h5>30%</h5>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course__review-item d-flex align-items-center justify-content-between">
                                                                <div class="course__review-text">
                                                                    <span>3 stars</span>
                                                                </div>
                                                                <div class="course__review-progress">
                                                                    <div class="single-progress" data-width="0%"></div>
                                                                </div>
                                                                <div class="course__review-percent">
                                                                    <h5>0%</h5>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course__review-item d-flex align-items-center justify-content-between">
                                                                <div class="course__review-text">
                                                                    <span>2 stars</span>
                                                                </div>
                                                                <div class="course__review-progress">
                                                                    <div class="single-progress" data-width="0%"></div>
                                                                </div>
                                                                <div class="course__review-percent">
                                                                    <h5>0%</h5>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="course__review-item d-flex align-items-center justify-content-between">
                                                                <div class="course__review-text">
                                                                    <span>1 stars</span>
                                                                </div>
                                                                <div class="course__review-progress">
                                                                    <div class="single-progress" data-width="0%"></div>
                                                                </div>
                                                                <div class="course__review-percent">
                                                                    <h5>0%</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="course__comment mb-75">
                                            <h3 class="course__comment-title">2 Comments</h3>

                                            <ul>
                                                <li>
                                                    <div class="course__comment-box ">
                                                        <div class="course__comment-thumb float-start">
                                                            <img src="assets/img/course/comment/course-comment-1.jpg"
                                                                 alt="">
                                                        </div>
                                                        <div class="course__comment-content">
                                                            <div class="course__comment-wrapper ml-70 fix">
                                                                <div class="course__comment-info float-start">
                                                                    <h4>Eleanor Fant</h4>
                                                                    <span>July 14, 2022</span>
                                                                </div>
                                                                <div
                                                                    class="course__comment-rating float-start float-sm-end">
                                                                    <ul>
                                                                        <li><a href="#"> <i
                                                                                    class="fa-solid fa-star"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li><a href="#"> <i
                                                                                    class="fa-solid fa-star"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li><a href="#"> <i
                                                                                    class="fa-solid fa-star"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li><a href="#"> <i
                                                                                    class="fa-solid fa-star"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li><a href="#"> <i
                                                                                    class="fa-solid fa-star"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="course__comment-text ml-70">
                                                                <p>So I said lurgy dropped a clanger Jeffrey bugger
                                                                    cuppa gosh David blatant have it, standard A bit of
                                                                    how's your father my lady absolutely.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="children">
                                                    <div class="course__comment-box ">
                                                        <div class="course__comment-thumb float-start">
                                                            <img src="assets/img/course/comment/course-comment-1.jpg"
                                                                 alt="">
                                                        </div>
                                                        <div class="course__comment-content">
                                                            <div class="course__comment-wrapper ml-70 fix">
                                                                <div class="course__comment-info float-start">
                                                                    <h4>Eleanor Fant</h4>
                                                                    <span>July 14, 2022</span>
                                                                </div>
                                                                <div
                                                                    class="course__comment-rating float-start float-sm-end">
                                                                    <ul>
                                                                        <li><a href="#"> <i
                                                                                    class="fa-solid fa-star"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li><a href="#"> <i
                                                                                    class="fa-solid fa-star"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li><a href="#"> <i
                                                                                    class="fa-solid fa-star"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li><a href="#"> <i
                                                                                    class="fa-solid fa-star"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li><a href="#"> <i
                                                                                    class="fa-solid fa-star"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="course__comment-text ml-70">
                                                                <p>So I said lurgy dropped a clanger Jeffrey bugger
                                                                    cuppa gosh David blatant have it, standard A bit of
                                                                    how's your father my lady absolutely.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="course__comment-box ">
                                                        <div class="course__comment-thumb float-start">
                                                            <img src="assets/img/course/comment/course-comment-2.jpg"
                                                                 alt="">
                                                        </div>
                                                        <div class="course__comment-content">
                                                            <div class="course__comment-wrapper ml-70 fix">
                                                                <div class="course__comment-info float-start">
                                                                    <h4>Shahnewaz Sakil</h4>
                                                                    <span>July 17, 2022</span>
                                                                </div>
                                                                <div
                                                                    class="course__comment-rating float-start float-sm-end">
                                                                    <ul>
                                                                        <li><a href="#"> <i
                                                                                    class="fa-solid fa-star"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li><a href="#"> <i
                                                                                    class="fa-solid fa-star"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li><a href="#"> <i
                                                                                    class="fa-solid fa-star"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li><a href="#"> <i
                                                                                    class="fa-solid fa-star"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li><a href="#"> <i
                                                                                    class="fa-solid fa-star"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="course__comment-text ml-70">
                                                                <p>David blatant have it, standard A bit of how's your
                                                                    father my lady absolutely.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="course__form">
                                            <h3 class="course__form-title">Write a Review</h3>
                                            <div class="course__form-inner">
                                                <form action="#">
                                                    <div class="row">
                                                        <div class="col-xxl-6">
                                                            <div class="course__form-input">
                                                                <input type="text" placeholder="Your Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-xxl-6">
                                                            <div class="course__form-input">
                                                                <input type="email" placeholder="Your Email">
                                                            </div>
                                                        </div>
                                                        <div class="col-xxl-12">
                                                            <div class="course__form-input">
                                                                <input type="text" placeholder="Review Title">
                                                            </div>
                                                        </div>
                                                        <div class="col-xxl-12">
                                                            <div class="course__form-input">
                                                                <div class="course__form-rating">
                                                                    <span>Rating : </span>
                                                                    <ul>
                                                                        <li><a href="#"> <i
                                                                                    class="fa-solid fa-star"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li><a href="#"> <i
                                                                                    class="fa-solid fa-star"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li><a href="#"> <i
                                                                                    class="fa-solid fa-star"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li><a href="#" class="no-rating"> <i
                                                                                    class="fa-solid fa-star"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li><a href="#" class="no-rating"> <i
                                                                                    class="fa-solid fa-star"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <textarea placeholder="Review Summary"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xxl-12">
                                                            <div class="course__form-btn mt-10 mb-55">
                                                                <button type="submit" class="tp-btn">Submit Review
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="member" role="tabpanel" aria-labelledby="member-tab">
                                    <div class="course__member mb-45">
                                        @if(\Illuminate\Support\Facades\Auth::check())
                                            @foreach($company?->price as $price)
                                                <div class="course__member-item mb-4">
                                                    <div class="row align-items-center">
                                                        <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-8">
                                                            <div class="course__member-thumb d-flex align-items-center">
                                                                <img src="{{ asset('images/baykus.png') }}"
                                                                     alt="Price Image" class="img-fluid"
                                                                     style="width: 50px; height: 50px;">
                                                                <div class="course__member-name ml-20">
                                                                    <h5>{{ $price->price_title->label() }}</h5>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-4 text-end">
                                                            <div class="course__member-info">
                                                                @if($price?->discounted_price)
                                                                    <h5>
                                                            <span
                                                                style="text-decoration: line-through; color: #b0b0b0;">
                                                                {{ number_format($price->price, 2) }} ₺
                                                            </span>
                                                                        <span
                                                                            style="color: #28a745; font-weight: bold;">
                                                                {{ number_format($price->discounted_price, 2) }} ₺
                                                            </span>
                                                                    </h5>
                                                                    <span style="color: #ff6f61;">İndirimli Fiyat</span>
                                                                @else
                                                                    <h5>{{ number_format($price->price, 2) }} ₺</h5>
                                                                    <span>Fiyat</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="course__member-item mb-4">
                                                Fiyatları görmek için
                                                <a href="{{route("login")}}" style="font-weight: bolder">giriş</a>
                                                yapınız
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                @if($company->info?->facebook || $company->info?->twitter
                                    || $company->info?->instagram || $company->info?->youtube)
                                    <div class="course__share mt-4">
                                        <h3>Sosyal Medya</h3>
                                        <ul>
                                            @if($company->info?->facebook)
                                                <li>
                                                    <a href="{{$company->info?->facebook}}" target="_blank" class="fb">
                                                        <i class="fa-brands fa-facebook-f"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if($company->info?->twitter)
                                                <li>
                                                    <a href="{{$company->info?->twitter}}" target="_blank" class="tw">
                                                        <i class="fa-brands fa-twitter"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if($company->info?->instagram)
                                                <li>
                                                    <a href="{{$company->info?->instagram}}" target="_blank" class="fb">
                                                        <i class="fa-brands fa-instagram"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if($company->info?->youtube)
                                                <li>
                                                    <a href="{{$company->info?->youtube}}" target="_blank" class="pin">
                                                        <i class="fa-brands fa-youtube"></i>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="course__related">
                            <div class="row">
                                <div class="col-xxl-12">
                                    <div class="section__title-wrapper mb-40">
                                        <h2 class="section__title">Related Course</h2>
                                        <p>You don't have to struggle alone, you've got our assistance and help.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xxl-12">
                                    <div class="course__slider swiper-container pb-60">
                                        <div class="swiper-wrapper">
                                            <div class="course__item-2 swiper-slide transition-3 white-bg mb-30 fix">
                                                <div class="course__thumb-2 w-img fix">
                                                    <a href="course-details.html">
                                                        <img src="assets/img/course/2/course-1.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="course__content-2">
                                                    <div
                                                        class="course__top-2 d-flex align-items-center justify-content-between">
                                                        <div class="course__tag-2">
                                                            <a href="#">Design Thinking</a>
                                                        </div>
                                                        <div class="course__price-2">
                                                            <span>$136</span>
                                                        </div>
                                                    </div>
                                                    <h3 class="course__title-2">
                                                        <a href="course-details.html">Mechanical Engineering and
                                                            Electrical Engineering Explained.</a>
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
                                                        <div class="course__tutor-2">
                                                            <a href="#">
                                                                <img src="assets/img/course/tutor/course-tutor-1.jpg"
                                                                     alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="course__item-2 swiper-slide transition-3 white-bg mb-30 fix">
                                                <div class="course__thumb-2 w-img fix">
                                                    <a href="course-details.html">
                                                        <img src="assets/img/course/2/course-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="course__content-2">
                                                    <div
                                                        class="course__top-2 d-flex align-items-center justify-content-between">
                                                        <div class="course__tag-2 pink-bg">
                                                            <a href="#">Mechanical</a>
                                                        </div>
                                                        <div class="course__price-2">
                                                            <span>$210</span>
                                                        </div>
                                                    </div>
                                                    <h3 class="course__title-2">
                                                        <a href="course-details.html">The Challenge Of Global Learning
                                                            In Public Education.</a>
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
                                                                            <span>3.3k</span>
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
                                                                            <span>56k</span>
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
                                                                            <span>4.5</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="course__tutor-2">
                                                            <a href="#">
                                                                <img src="assets/img/course/tutor/course-tutor-2.jpg"
                                                                     alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="course__item-2 swiper-slide transition-3 white-bg mb-30 fix">
                                                <div class="course__thumb-2 w-img fix">
                                                    <a href="course-details.html">
                                                        <img src="assets/img/course/2/course-3.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="course__content-2">
                                                    <div
                                                        class="course__top-2 d-flex align-items-center justify-content-between">
                                                        <div class="course__tag-2 violet-bg">
                                                            <a href="#">Design Thinking</a>
                                                        </div>
                                                        <div class="course__price-2">
                                                            <span>$136</span>
                                                        </div>
                                                    </div>
                                                    <h3 class="course__title-2">
                                                        <a href="course-details.html">Mechanical Engineering and
                                                            Electrical Engineering Explained.</a>
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
                                                                            <span>3.7k</span>
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
                                                                            <span>36k</span>
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
                                                                            <span>2.5</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="course__tutor-2">
                                                            <a href="#">
                                                                <img src="assets/img/course/tutor/course-tutor-3.jpg"
                                                                     alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="course__item-2 swiper-slide transition-3 white-bg mb-30 fix">
                                                <div class="course__thumb-2 w-img fix">
                                                    <a href="course-details.html">
                                                        <img src="assets/img/course/2/course-4.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="course__content-2">
                                                    <div
                                                        class="course__top-2 d-flex align-items-center justify-content-between">
                                                        <div class="course__tag-2 yellow-bg">
                                                            <a href="#">Photography</a>
                                                        </div>
                                                        <div class="course__price-2">
                                                            <span>$136</span>
                                                        </div>
                                                    </div>
                                                    <h3 class="course__title-2">
                                                        <a href="course-details.html">Statistics Data Scince and
                                                            Business Analysis.</a>
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
                                                                            <span>2.3k</span>
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
                                                                            <span>66k</span>
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
                                                                            <span>3.5</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="course__tutor-2">
                                                            <a href="#">
                                                                <img src="assets/img/course/tutor/course-tutor-4.jpg"
                                                                     alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="course__item-2 swiper-slide transition-3 white-bg mb-30 fix">
                                                <div class="course__thumb-2 w-img fix">
                                                    <a href="course-details.html">
                                                        <img src="assets/img/course/2/course-5.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="course__content-2">
                                                    <div
                                                        class="course__top-2 d-flex align-items-center justify-content-between">
                                                        <div class="course__tag-2 blue-bg-2">
                                                            <a href="#">Python</a>
                                                        </div>
                                                        <div class="course__price-2">
                                                            <span>$136</span>
                                                        </div>
                                                    </div>
                                                    <h3 class="course__title-2">
                                                        <a href="course-details.html">Machine Learning A-Z: Hands-On
                                                            Python and java.</a>
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
                                                                            <span>1.2k</span>
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
                                                                            <span>32k</span>
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
                                                                            <span>4.7</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="course__tutor-2">
                                                            <a href="#">
                                                                <img src="assets/img/course/tutor/course-tutor-5.jpg"
                                                                     alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="course__item-2 swiper-slide transition-3 white-bg mb-30 fix">
                                                <div class="course__thumb-2 w-img fix">
                                                    <a href="course-details.html">
                                                        <img src="assets/img/course/2/course-6.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="course__content-2">
                                                    <div
                                                        class="course__top-2 d-flex align-items-center justify-content-between">
                                                        <div class="course__tag-2 purple-bg">
                                                            <a href="#">Design Thinking</a>
                                                        </div>
                                                        <div class="course__price-2">
                                                            <span>$136</span>
                                                        </div>
                                                    </div>
                                                    <h3 class="course__title-2">
                                                        <a href="course-details.html">The most complete Design Thinking
                                                            Course on the Market..</a>
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
                                                                            <span>3.0k</span>
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
                                                                            <span>26k</span>
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
                                                                            <span>4.1</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="course__tutor-2">
                                                            <a href="#">
                                                                <img src="assets/img/course/tutor/course-tutor-6.jpg"
                                                                     alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Add Pagination -->
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4">
                    <div class="course__sidebar pl-70 p-relative">
                        <div class="course__sidebar-widget-2 white-bg mb-20">
                            <div class="course__video">
                                <div class="course__video-thumb w-img mb-25">
                                    <img src="{{$company?->image_url ?? \App\Service\Helper::getNoImage()}}" alt="">
                                </div>
                                <div class="course__video-content mb-35">
                                    <ul>
                                        <li class="d-flex align-items-center">
                                            <div class="course__video-icon">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                     viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;"
                                                     xml:space="preserve">
                                             <path class="st0"
                                                   d="M2,6l6-4.7L14,6v7.3c0,0.7-0.6,1.3-1.3,1.3H3.3c-0.7,0-1.3-0.6-1.3-1.3V6z"/>
                                                    <polyline class="st0" points="6,14.7 6,8 10,8 10,14.7 "/>
                                          </svg>
                                            </div>
                                            <div class="course__video-info">
                                                <h5><span>İl :</span>{{$company->city}}</h5>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <div class="course__video-icon">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                     viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;"
                                                     xml:space="preserve">
                                             <path class="st0"
                                                   d="M2,6l6-4.7L14,6v7.3c0,0.7-0.6,1.3-1.3,1.3H3.3c-0.7,0-1.3-0.6-1.3-1.3V6z"/>
                                                    <polyline class="st0" points="6,14.7 6,8 10,8 10,14.7 "/>
                                          </svg>
                                            </div>
                                            <div class="course__video-info">
                                                <h5><span>İlçe :</span>{{$company->district}}</h5>
                                            </div>
                                        </li>

                                        <li class="d-flex align-items-center">
                                            <div class="course__video-icon">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                     viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;"
                                                     xml:space="preserve">
                                             <circle class="st0" cx="8" cy="8" r="6.7"/>
                                                    <polyline class="st0" points="8,4 8,8 10.7,9.3 "/>
                                          </svg>
                                            </div>
                                            <div class="course__video-info">
                                                <h5><span>website :</span>{{$company->website ?? "Yok"}}</h5>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <div class="course__video-icon">
                                                <svg>
                                                    <path class="st0"
                                                          d="M13.3,14v-1.3c0-1.5-1.2-2.7-2.7-2.7H5.3c-1.5,0-2.7,1.2-2.7,2.7V14"/>
                                                    <circle class="st0" cx="8" cy="4.7" r="2.7"/>
                                                </svg>
                                            </div>
                                            <div class="course__video-info">
                                                <h5><span>Adres :</span>{{$company->address}}</h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="course__enroll-btn">
                                    <button type="button" class="tp-btn w-100 text-center" data-bs-toggle="modal"
                                            data-bs-target="#course_enroll_modal">Ücretsiz İletişime Geç <i
                                            class="far fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="course__sidebar-widget-2 white-bg mb-20">
                            <div class="course__sidebar-course">
                                <h3 class="course__sidebar-title">Related courses</h3>
                                <ul>
                                    <li>
                                        <div class="course__sm d-flex align-items-center mb-30">
                                            <div class="course__sm-thumb mr-20">
                                                <a href="course-details.html">
                                                    <img src="assets/img/course/sm/course-sm-1.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="course__sm-content">
                                                <div class="course__sm-rating">
                                                    <ul>
                                                        <li><a href="#"> <i class="fa-solid fa-star"></i> </a></li>
                                                        <li><a href="#"> <i class="fa-solid fa-star"></i> </a></li>
                                                        <li><a href="#"> <i class="fa-solid fa-star"></i> </a></li>
                                                        <li><a href="#"> <i class="fa-solid fa-star"></i> </a></li>
                                                        <li><a href="#"> <i class="fa-solid fa-star"></i> </a></li>
                                                    </ul>
                                                </div>
                                                <h5><a href="course-details.html">Development</a></h5>
                                                <div class="course__sm-price">
                                                    <span>$54.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="course__sm d-flex align-items-center mb-30">
                                            <div class="course__sm-thumb mr-20">
                                                <a href="course-details.html">
                                                    <img src="assets/img/course/sm/course-sm-2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="course__sm-content">
                                                <div class="course__sm-rating">
                                                    <ul>
                                                        <li><a href="#"> <i class="fa-solid fa-star"></i> </a></li>
                                                        <li><a href="#"> <i class="fa-solid fa-star"></i> </a></li>
                                                        <li><a href="#"> <i class="fa-solid fa-star"></i> </a></li>
                                                        <li><a href="#"> <i class="fa-solid fa-star"></i> </a></li>
                                                        <li><a href="#"> <i class="fa-solid fa-star"></i> </a></li>
                                                    </ul>
                                                </div>
                                                <h5><a href="course-details.html">Data Science</a></h5>
                                                <div class="course__sm-price">
                                                    <span>$72.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="course__sm d-flex align-items-center mb-10">
                                            <div class="course__sm-thumb mr-20">
                                                <a href="course-details.html">
                                                    <img src="assets/img/course/sm/course-sm-3.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="course__sm-content">
                                                <div class="course__sm-rating">
                                                    <ul>
                                                        <li><a href="#"> <i class="fa-solid fa-star"></i> </a></li>
                                                        <li><a href="#"> <i class="fa-solid fa-star"></i> </a></li>
                                                        <li><a href="#"> <i class="fa-solid fa-star"></i> </a></li>
                                                        <li><a href="#"> <i class="fa-solid fa-star"></i> </a></li>
                                                        <li><a href="#"> <i class="fa-solid fa-star"></i> </a></li>
                                                    </ul>
                                                </div>
                                                <h5><a href="course-details.html">UX Design</a></h5>
                                                <div class="course__sm-price">
                                                    <span>Free</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- course area end -->

    <!-- course enroll popup start -->
    <div class="course__popup">
        <!-- Modal -->
        <div class="modal fade" id="course_enroll_modal" tabindex="-1" aria-labelledby="course_enroll_modal"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="course__popup-wrapper p-relative">
                        <div class="course__popup-close">
                            <button type="button" class="course__popup-close-btn" data-bs-toggle="modal"
                                    data-bs-target="#course_enroll_modal"><i class="fa-light fa-xmark"></i></button>
                        </div>
                        <div class="course__popup-top d-flex align-items-start mb-40  d-flex justify-content-center">
                            <div class="course__popup-content">
                                <h3 class="course__popup-title">
                                    Ücretsiz iletişime geç
                                </h3>
                            </div>
                        </div>
                        <div class="course__popup-info">
                            <form action="{{route("front.contact.create",["id"=> $company->id])}}" method="POST">
                                @csrf
                                <div class="row gx-3">
                                    <div class="col-xl-12">
                                        <div class="course__popup-input">
                                            <input type="text" name="name" placeholder="Ad Soyad">
                                            <span class="course__popup-input-icon"><i
                                                    class="fa-light fa-user"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="course__popup-input">
                                            <input type="email" name="email" placeholder="Email">
                                            <span class="course__popup-input-icon"><i class="fa-light fa-envelope"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="course__popup-input">
                                            <input type="text" name="phone" placeholder="Telefon">
                                            <span class="course__popup-input-icon"><i
                                                    class="fa-light fa-phone"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12">
                                        <div class="course__popup-btn">
                                            <button type="submit" class="tp-btn w-100">İletişime Geç</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- course enroll popup end -->
@endsection

@push('style')
    <style>
        .map-container {
            position: relative;
            padding-bottom: 56.25%;
            overflow: hidden;
            width: 100%;
            height: 0;
            border: 1px solid gray;
        }

        @media (max-width: 768px) {
            .map-container {
                padding-bottom: 75%;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new Swiper(".swiper-container", {
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
            });
        });

    </script>
@endpush
