@extends('front.layout.app')

@section('title', 'Home Page')
@section('content')
    <section class="signup__area p-relative z-index-1 pt-100 pb-145">
        <div class="sign__shape">
            <img class="man-1" src="{{asset("front/assets/img/icon/sign/man-1.png")}}" alt="">
            <img class="man-2" src="{{asset("front/assets/img/icon/sign/man-2.png")}}" alt="">
            <img class="circle" src="{{asset("front/assets/img/icon/sign/circle.png")}}" alt="">
            <img class="zigzag" src="{{asset("front/assets/img/icon/sign/zigzag.png")}}" alt="">
            <img class="dot" src="{{asset("front/assets/img/icon/sign/dot.png")}}" alt="">
            <img class="bg" src="{{asset("front/assets/img/icon/sign/sign-up.png")}}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="sign__wrapper white-bg">
                        <!--
                        <div class="sign__header mb-35">
                            <div class="sign__in text-center">
                                <a href="#" class="sign__social text-start mb-15"><i class="fab fa-facebook-f"></i>Sign in with Facebook</a>
                                <p> <span>........</span> Or, <a href="sign-in.html">sign in</a> with your email<span> ........</span> </p>
                            </div>
                        </div>
                        -->
                        <div class="sign__form">
                            <form action="{{route("loginPost")}}" method="POST">
                                @csrf
                                <div class="sign__input-wrapper mb-25">
                                    <h5>Email Adresi</h5>
                                    <div class="sign__input">
                                        <input type="text" name="email" placeholder="Mail adresi">
                                        <i class="fal fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="sign__input-wrapper mb-10">
                                    <h5>Şifre</h5>
                                    <div class="sign__input">
                                        <input type="password" name="password" placeholder="Şifre">
                                        <i class="fal fa-lock"></i>
                                    </div>
                                </div>
                                <div class="sign__action d-sm-flex justify-content-between mb-30">
                                    <div class="sign__forgot">
                                        <a href="#">Şifremi Unuttum?</a>
                                    </div>
                                </div>
                                <button type="submit" class="tp-btn  w-100"><span></span> Giriş Yap</button>
                                <div class="sign__new text-center mt-20">
                                    <p>Hesabınız yok mu? <a href="{{"register"}}">Kayıt Ol</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
