@extends('front.layout.app')

@section('title', 'Kurumlar')
@section('content')
    <section class="course__area pt-115 pb-90 grey-bg-3">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="course__tab-inner white-bg mb-50">
                        <div class="row align-items-center">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="course__tab-wrapper d-flex align-items-center">
                                    <div class="course__view">
                                        <h4>Showing 1 - 6 of 84</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            {{ $companies->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-4 col-lg-4">
                    <div class="course__sidebar pl-70">
                        <div class="course__sidebar-widget white-bg">
                            <div class="course__sidebar-search">
                                <form action="#">
                                    <input type="text" placeholder="Dershane Ara...">
                                    <button type="submit">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             viewBox="0 0 584.4 584.4" style="enable-background:new 0 0 584.4 584.4;"
                                             xml:space="preserve">
                                       <g>
                                           <g>
                                               <path class="st0"
                                                     d="M565.7,474.9l-61.1-61.1c-3.8-3.8-8.8-5.9-13.9-5.9c-6.3,0-12.1,3-15.9,8.3c-16.3,22.4-36,42.1-58.4,58.4    c-4.8,3.5-7.8,8.8-8.3,14.5c-0.4,5.6,1.7,11.3,5.8,15.4l61.1,61.1c12.1,12.1,28.2,18.8,45.4,18.8c17.1,0,33.3-6.7,45.4-18.8    C590.7,540.6,590.7,499.9,565.7,474.9z"/>
                                               <path class="st1"
                                                     d="M254.6,509.1c140.4,0,254.5-114.2,254.5-254.5C509.1,114.2,394.9,0,254.6,0C114.2,0,0,114.2,0,254.5    C0,394.9,114.2,509.1,254.6,509.1z M254.6,76.4c98.2,0,178.1,79.9,178.1,178.1s-79.9,178.1-178.1,178.1S76.4,352.8,76.4,254.5    S156.3,76.4,254.6,76.4z"/>
                                           </g>
                                       </g>
                                    </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="course__sidebar-widget white-bg">
                            <div class="course__sidebar-info">
                                <h3 class="course__sidebar-title">Kurslar</h3>
                                <ul>
                                    @foreach($courses as $course)
                                        <li>
                                            <div class="course__sidebar-check mb-10 d-flex align-items-center">
                                                <input class="m-check-input" type="checkbox" id="m-eng">
                                                <label class="m-check-label"
                                                       for="m-eng">{{strtoupper($course->name)}}</label>
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
                                                    onchange="updateDistricts()">
                                                <option value="">Seçiniz</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="course__sidebar-check">
                                            <label class="m-check-label" for="districtSelect">İlçe</label>
                                            <select name="district" id="districtSelect" class="m-check-input">
                                                <option value="">Önce ili seçiniz</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
