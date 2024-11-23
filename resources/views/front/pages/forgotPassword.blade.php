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

                        <div class="sign__form">
                            <form action="{{route("user.forgot")}}" method="POST">
                                @csrf
                                <div class="sign__input-wrapper mb-25">
                                    <h5>Email Adresi</h5>
                                    <div class="sign__input">
                                        <input type="text" name="email" placeholder="Mail adresi">
                                        <i class="fal fa-envelope"></i>
                                    </div>
                                </div>

                                <button type="submit" class="tp-btn  w-100"><span></span> Gönder</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

