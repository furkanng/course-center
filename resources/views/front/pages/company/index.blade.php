@extends('front.layout.app')

@section('title', 'Dershaneler')
@section('content')
    <section class="course__area pt-115 pb-90 grey-bg-3">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="course__tab-conent">
                                <div class="tab-content" id="courseTabContent">
                                    <div class="tab-pane fade show active" id="grid" role="tabpanel"
                                         aria-labelledby="grid-tab">

                                        <div class="row">
                                            @foreach($companies as $company)
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-4">
                                                    <div class="card h-100">
                                                        <a href="{{$company->link}}">
                                                            <div class="course__thumb-2 w-img">
                                                                @if($company->image)
                                                                    <img src="{{$company->image_url}}"
                                                                         class="card-img-top" alt="">
                                                                @else
                                                                    <img src="{{ asset("images/noImage2.webp") }}"
                                                                         class="card-img-top" alt="">
                                                                @endif
                                                            </div>
                                                        </a>
                                                        <div class="card-body d-flex flex-column">
                                                            <div class="course__top-2 d-flex flex-wrap mb-2">
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
                                                                <a href="{{$company->link}}"
                                                                   class="stretched-link">
                                                                        <span
                                                                            style="font-size: medium">{{$company->name}}</span>
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

                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="basic-pagination">
                                <nav>
                                    <ul>
                                        <!-- Previous Page Link -->
                                        @if ($companies->onFirstPage())
                                            <li class="disabled">
                                                <span><i class="far fa-angle-left"></i></span>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ $companies->previousPageUrl() }}">
                                                    <i class="far fa-angle-left"></i>
                                                </a>
                                            </li>
                                        @endif

                                        <!-- Pagination Elements -->
                                        @php
                                            $start = max($companies->currentPage() - 2, 1);
                                            $end = min($companies->currentPage() + 2, $companies->lastPage());
                                        @endphp
                                        @if ($start > 1)
                                            <li>
                                                <a href="{{ $companies->url(1) }}">1</a>
                                            </li>
                                            @if ($start > 2)
                                                <li class="disabled"><span>...</span></li>
                                            @endif
                                        @endif

                                        @foreach (range($start, $end) as $page)
                                            @if ($page == $companies->currentPage())
                                                <li>
                                                    <span class="current">{{ $page }}</span>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="{{ $companies->url($page) }}">{{ $page }}</a>
                                                </li>
                                            @endif
                                        @endforeach

                                        @if ($end < $companies->lastPage())
                                            @if ($end < $companies->lastPage() - 1)
                                                <li class="disabled"><span>...</span></li>
                                            @endif
                                            <li>
                                                <a href="{{ $companies->url($companies->lastPage()) }}">{{ $companies->lastPage() }}</a>
                                            </li>
                                        @endif

                                        <!-- Next Page Link -->
                                        @if ($companies->hasMorePages())
                                            <li>
                                                <a href="{{ $companies->nextPageUrl() }}">
                                                    <i class="far fa-angle-right"></i>
                                                </a>
                                            </li>
                                        @else
                                            <li class="disabled">
                                                <span><i class="far fa-angle-right"></i></span>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xxl-4 col-xl-4 col-lg-4">
                    <div class="course__sidebar pl-70">
                        <form action="{{ route('front.company.index') }}" method="GET">
                            <div class="course__sidebar-widget white-bg">
                                <div class="course__sidebar-search">
                                    <input name="search" value="{{ request('search') }}" type="text"
                                           placeholder="Dershane Ara...">
                                </div>
                            </div>
                            <div class="course__sidebar-widget white-bg">
                                <div class="course__sidebar-info">
                                    <h3 class="course__sidebar-title">Kurslar</h3>
                                    <ul>
                                        @foreach($courses as $course)
                                            <li>
                                                <div class="course__sidebar-check mb-10 d-flex align-items-center">
                                                    <input class="m-check-input" type="checkbox"
                                                           id="course_{{ $course->name }}" name="courses[]"
                                                           value="{{ $course->name }}"
                                                        {{ in_array($course->name, request('courses', [])) ? 'checked' : '' }}>
                                                    <label class="m-check-label"
                                                           for="course_{{ $course->name }}">{{ strtoupper($course->name) }}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="course__sidebar-widget white-bg">
                                <div class="course__sidebar-info">
                                    <div class="row">
                                        <div class="col">
                                            <div class="course__sidebar-check">
                                                <label class="m-check-label" for="citySelect">İl</label>
                                                <select name="city" id="citySelect" class="m-check-input"
                                                        onchange="updateDistricts()"
                                                        data-selected-city="{{ request('city') }}">
                                                    <option
                                                        value="" {{ request('city') == value("city") ? 'selected' : '' }}>
                                                        Seçiniz
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="course__sidebar-check">
                                                <label class="m-check-label" for="districtSelect">İlçe</label>
                                                <select name="district" id="districtSelect" class="m-check-input"
                                                        data-selected-district="{{ request('district') }}">
                                                    <option value="">Önce ili seçiniz</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-4">Ara</button>
                                        <a href="{{ route('front.company.index') }}" class="btn">
                                            Tüm filtreleri temizle
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('style')

@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetchProvinces();
            formatPhoneNumber();
        });
    </script>
@endpush
