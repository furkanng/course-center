@extends('front.layout.app')

@section('title', 'Home Page')
@section('content')
    <x-register-modal
        title="Kayıt"
        body="Kurum kaydı başarıyla oluşturuldu onay bekleniyor..."
    >
    </x-register-modal>
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
                <div class="col-xxl-8 offset-xxl-2 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="sign__wrapper white-bg">
                        <div class="sign__form">
                            <form action="{{route("registerPost")}}" method="POST">
                                @csrf
                                <div class="sign__input-wrapper mb-25 d-flex justify-content-center">
                                    <div class="radio-inputs" id="role">
                                        <label class="radio">
                                            <input class="role" type="radio" name="role" value="guest" checked>
                                            <span class="name">Öğrenci</span>
                                        </label>
                                        <label class="radio">
                                            <input class="role" type="radio" name="role" value="company">
                                            <span class="name">Kurum</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="sign__input-wrapper mb-25" id="name">
                                            <div class="d-flex justify-content-between">
                                                <h5>İsim Soyisim *</h5>
                                                @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="sign__input">
                                                <input type="text" name="name" value="{{ old('name') }}"
                                                       required placeholder="Adınız Soyadınız">
                                                <i class="fal fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="sign__input-wrapper mb-25" id="email">
                                            <div class="d-flex justify-content-between">
                                                <h5>Email Adresi *</h5>
                                                @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="sign__input">
                                                <input type="text" name="email" value="{{ old('email') }}" required
                                                       placeholder="test@test.com">
                                                <i class="fal fa-envelope"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="sign__input-wrapper mb-25" id="city">
                                            <div class="d-flex justify-content-between">
                                                <h5>İl *</h5>
                                                @error('city')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="sign__input">
                                                <select name="city" id="citySelect" required
                                                        onchange="updateDistricts()">
                                                    <option value="">Seciniz</option>
                                                </select>
                                                <i class="fal fa-city mt-4 pt-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="sign__input-wrapper mb-25" id="district">
                                            <div class="d-flex justify-content-between">
                                                <h5>İlçe *</h5>
                                                @error('district')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="sign__input">
                                                <select name="district" required id="districtSelect">
                                                    <option value="">Önce ili seçiniz</option>
                                                </select>
                                                <i class="fal fa-city mt-4 pt-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="sign__input-wrapper mb-25" id="password">
                                            <div class="d-flex justify-content-between">
                                                <h5>Şifre *</h5>
                                                @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="sign__input">
                                                <input type="password" required name="password" placeholder="Şifre">
                                                <i class="fal fa-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="sign__input-wrapper mb-25" id="password_confirmation">
                                            <div class="d-flex justify-content-between">
                                                <h5>Şifre Tekrar *</h5>
                                                @error('password_confirmation')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="sign__input">
                                                <input type="password" required name="password_confirmation"
                                                       placeholder="Şifre Tekrar">
                                                <i class="fal fa-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="sign__input-wrapper mb-25" id="phone">
                                            <div class="d-flex justify-content-between">
                                                <h5>Telefon Numarası *</h5>
                                                @error('phone')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="sign__input">
                                                <input type="text" name="phone" value="{{ old('phone') }}" required
                                                       placeholder="(555) 555 55 55"
                                                       oninput="formatPhoneNumber(this)"

                                                       maxlength="10">
                                                <i class="fal fa-phone"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="sign__input-wrapper mb-25" id="user_type_user">
                                            <div class="d-flex justify-content-between">
                                                <h5>Kullanıcı Tipi *</h5>
                                                @error('user_type')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="sign__input">
                                                <select name="user_type" id="user_type" required>
                                                    <option value="">Seçiniz</option>
                                                    @foreach(\App\Enums\UserType::cases() as $key)
                                                        @if($key->isGuest())
                                                            <option value="{{$key->value}}">{{$key->label()}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <i class="fal fa fa-address-card mt-4 pt-2"></i>
                                            </div>
                                        </div>

                                        <div class="sign__input-wrapper mb-25" id="user_type_company">
                                            <div class="d-flex justify-content-between">
                                                <h5>Kullanıcı Tipi *</h5>
                                                @error('user_type')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="sign__input">
                                                <select name="user_type" id="user_type" required>
                                                    <option value="">Seçiniz</option>
                                                    @foreach(\App\Enums\UserType::cases() as $key)
                                                        @if($key->isCompany())
                                                            <option value="{{$key->value}}">{{$key->label()}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <i class="fal fa fa-address-card mt-4 pt-2"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="sign__input-wrapper mb-25" id="company_name" style="display: none">
                                            <div class="d-flex justify-content-between">
                                                <h5>Firma Adı *</h5>
                                                @error('company_name')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="sign__input">
                                                <input type="text" name="company_name" value="{{ old('company_name') }}"
                                                       required placeholder="Firma İsmi">
                                                <i class="fal fa-building"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="sign__input-wrapper mb-25" id="company_type" style="display: none">
                                            <div class="d-flex justify-content-between">
                                                <h5>Firma Tipi *</h5>
                                                @error('company_type')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="sign__input">
                                                <select name="company_type" required>
                                                    <option value="">Seçiniz</option>
                                                    @foreach($types as $type)
                                                        <option value={{$type->code}}>{{$type->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i class="fal fa fa-address-card mt-4 pt-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sign__action d-flex justify-content-between mb-30">
                                    <div class="sign__agree d-flex align-items-center">
                                        <input class="m-check-input" type="checkbox" id="m-agree" name="kvkk_approve"
                                               required>
                                        <label class="m-check-label" for="m-agree"><a
                                                {{--href="{{route("front.page",["seo_link" => $page->seo_link])}}"--}}
                                                target="_blank">
                                                {{$page->title}}</a>
                                            kabul ediyorum
                                        </label>
                                        @error('agree')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="tp-btn  w-100"><span></span>Kayıt Ol</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .radio-inputs {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            border-radius: 0.5rem;
            background-color: #EEE;
            box-sizing: border-box;
            box-shadow: 0 0 0px 1px rgba(0, 0, 0, 0.06);
            padding: 0.25rem;
            width: 300px;
            font-size: 14px;
        }

        .radio-inputs .radio {
            flex: 1 1 auto;
            text-align: center;
        }

        .radio-inputs .radio input {
            display: none;
        }

        .radio-inputs .radio .name {
            display: flex;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            border-radius: 0.5rem;
            border: none;
            padding: .5rem 0;
            color: rgba(51, 65, 85, 1);
            transition: all .15s ease-in-out;
        }

        .radio-inputs .radio input:checked + .name {
            background-color: #fff;
            font-weight: 600;
        }

    </style>

    @if(session('registerSuccess'))

        <script>
            $(document).ready(function () {
                $('#registerModal').modal('show');
            });

        </script>

    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetchProvinces();
            formatPhoneNumber();
            $('select').niceSelect();

        });
    </script>

    <script>
        $(document).ready(function () {
            updateUserTypeOptions();

            $('.role').on('change', function () {
                updateUserTypeOptions();
            });

            function updateUserTypeOptions() {
                var role = document.querySelector('input[name="role"]:checked').value;

                var companyFields = ["company_name", "company_type", "user_type_company"];
                var userFields = ["user_type_user"];

                if (role === "guest") {
                    companyFields.forEach(function (id) {
                        var field = document.getElementById(id);
                        field.style.display = 'none';
                        field.querySelector('input, select').removeAttribute('required');
                    });
                    userFields.forEach(function (id) {
                        var field = document.getElementById(id);
                        field.style.display = 'block';
                        field.querySelector('input, select').removeAttribute('required');
                    });
                } else if (role === "company") {
                    companyFields.forEach(function (id) {
                        var field = document.getElementById(id);
                        field.style.display = 'block';
                        field.querySelector('input, select').setAttribute('required', 'required');
                    });
                    userFields.forEach(function (id) {
                        var field = document.getElementById(id);
                        field.style.display = 'none';
                        field.querySelector('input, select').removeAttribute('required');
                    });
                }
            }
        });
    </script>

@endsection
