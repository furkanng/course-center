<footer>
    <div class="footer__area">
        <div class="footer__top grey-bg-4 pt-95 pb-45">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-7">
                        <div class="footer__widget footer__widget-3 footer-col-3-1 mb-50">
                            <div class="footer__logo">
                                <div class="logo">
                                    <a href="{{ route("home") }}">
                                        <img src="{{$image["logo"]}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="footer__widget-content">
                                <div class="footer__widget-info">
                                    <div class="footer__subscribe footer__subscribe-3">
                                        <p>{{$language['text_1']}}</p>
                                        <form action="{{route("front.bulletin.create")}}" method="POST">
                                            @csrf

                                            <div class="footer__subscribe-input">
                                                <input type="text" name="email" placeholder="E posta">
                                                <button type="submit"
                                                        class="tp-btn-subscribe">{{$language['text_2']}}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-5">
                        <div class="footer__widget footer__widget-3 footer-col-3-2 mb-50">
                            <h3 class="footer__widget-title footer__widget-title-3">Kurslar</h3>
                            <div class="footer__widget-content">
                                <ul>
                                    @foreach($courses as $course)
                                        @if($course->menu_status)
                                            <li>
                                                <a href="{{route('front.company.index',["courses"=> [$course->name]])}}">
                                                    {{strtoupper($course->name)}}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-2 col-lg-2 col-md-3 col-sm-5">
                        <div class="footer__widget footer__widget-3 footer-col-3-3 mb-50">
                            <h3 class="footer__widget-title footer__widget-title-3">Sayfalar</h3>
                            <div class="footer__widget-content">
                                <ul>
                                    @foreach($pages as $page)
                                        @if($page->where('permanent',true))
                                            <li>
                                                <a href="{{url($page->link)}}">{{$page->title}}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-7">
                        <div class="footer__widget footer__widget-3 footer-col-3-4 mb-50">
                            <h3 class="footer__widget-title footer__widget-title-3">İletişim</h3>
                            <div class="footer__contact">
                                <ul>
                                    <li>
                                        <p>Adres:</p>
                                        <h4>{{$settings["contact_address"]}}</h4>
                                    </li>
                                    <li>
                                        <p>Telefon:</p>
                                        <h4>{{$settings["contact_phone"]}}</h4>
                                    </li>
                                    <li>
                                        <p>Mail:</p>
                                        <h4>{{$settings["contact_email"]}}</h4>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom grey-bg-4">
            <div class="container">
                <div class="footer__bottom-inner">
                    <div class="row">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                            <div class="footer__bottom-link">
                                <ul>
                                    <li>{{ $language["text_3"] }}</li>
                                    {{--
                                    <li>
                                        <a href="https://furkanguzelgorur.com" target="_blank">
                                            Furkan Güzelgörür Yazılım
                                        </a>
                                    </li>
                                    --}}
                                </ul>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                            <div class="footer__social footer__social-3 text-md-end">
                                <ul>
                                    <li><a href="{{$settings["media_facebook"]}}"><i
                                                class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="{{$settings["media_twitter"]}}"><i
                                                class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="{{$settings["media_linkedin"]}}"><i
                                                class="fa-brands fa-linkedin-in"></i></a></li>
                                    <li><a href="{{$settings["media_instagram"]}}"><i
                                                class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="{{$settings["media_youtube"]}}"><i
                                                class="fa-brands fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
