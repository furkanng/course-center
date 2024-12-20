@extends('front.layout.app')

@section('title', 'Profilim')
@section('content')
    <section class="profile__area pt-120 pb-50 grey-bg-2">
        <div class="container">
            <div class="profile__basic-inner pb-20 white-bg">
                <div class="row align-items-center">
                    <div class="col-xxl-6 col-md-6">
                        <div class="profile__basic d-md-flex align-items-center">
                            <div class="profile__basic-thumb mr-30">
                                <img src="{{\App\Service\Helper::getNoProfileImage()}}" alt="">
                            </div>
                            <div class="profile__basic-content">
                                <h3 class="profile__basic-title">
                                    Hoşgeldiniz <span>{{strtoupper($user->name)}}</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="profile__menu pb-70 grey-bg-2">
        <div class="container">
            <div class="row">
                <div class="col-xxl-4 col-md-4">
                    <div class="profile__menu-left white-bg mb-50">
                        <h3 class="profile__menu-title">
                            <i class="fa-regular fa-square-list"></i>Profilim</h3>
                        <div class="profile__menu-tab">
                            <div class="nav nav-tabs flex-column justify-content-start text-start" id="nav-tab"
                                 role="tablist">
                                <button class="nav-link active" id="nav-account-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-account" type="button" role="tab"
                                        aria-controls="nav-account" aria-selected="true"><i
                                        class="fa-regular fa-user"></i> Kişisel Bilgiler
                                </button>

                                <button class="nav-link" id="nav-order-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-order" type="button" role="tab" aria-controls="nav-order"
                                        aria-selected="false"><i class="fa-regular fa-file-lines"></i>İzinler ve
                                    Bildirimler
                                </button>

                                <button class="nav-link" id="nav-password-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-password" type="button" role="tab"
                                        aria-controls="nav-password" aria-selected="false"><i
                                        class="fa-regular fa-lock"></i>Şifre Değiştir
                                </button>

                                <button class="nav-link" id="nav-favorite-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-favorite" type="button" role="tab"
                                        aria-controls="nav-favorite" aria-selected="false"><i
                                        class="fa-regular fa-star"></i>Favoriler
                                </button>

                                <a href="{{route("logout")}}">
                                    <button class="nav-link"><i class="fa-regular fa-arrow-right-from-bracket"></i>
                                        Çıkış Yap
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-md-8">
                    <div class="profile__menu-right">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-account" role="tabpanel"
                                 aria-labelledby="nav-account-tab">
                                <div class="profile__info">

                                    <div class="profile__info-top d-flex justify-content-between align-items-center">
                                        <h3 class="profile__info-title">Kişisel Bilgiler</h3>
                                        <button class="profile__info-btn" type="button" data-bs-toggle="modal"
                                                data-bs-target="#profile_edit_modal"><i
                                                class="fa-regular fa-pen-to-square"></i> Düzenle
                                        </button>
                                    </div>

                                    <div class="profile__info-wrapper white-bg">
                                        <div class="profile__info-item">
                                            <p>İsim Soyisim</p>
                                            <h4>{{$user->name}}</h4>
                                        </div>
                                        <div class="profile__info-item">
                                            <p>Email</p>
                                            <h4>{{$user->email}}</h4>
                                        </div>
                                        <div class="profile__info-item">
                                            <p>Telefon</p>
                                            <h4>{{$user->phone}}</h4>
                                        </div>
                                        <div class="profile__info-item">
                                            <p>İl</p>
                                            <h4>{{$user->city}}</h4>
                                        </div>
                                        <div class="profile__info-item">
                                            <p>İlçe</p>
                                            <h4>{{$user->district}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab">
                                <div class="order__info">
                                    <div class="order__info-top d-flex justify-content-between align-items-center">
                                        <h3 class="order__info-title">İzinler ve Bildirimler</h3>
                                    </div>

                                    <div class="order__list white-bg table-responsive">
                                        <form class="form-update"
                                              action="{{route("front.profil.updatePermission",["id" => $user->id])}}"
                                              method="POST">
                                            @csrf
                                            @method("PUT")
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <span>Sms ile bilgilendirme yapılmasına izin veriyorum</span>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" name="sms_approve" type="checkbox"
                                                           id="smsPermission" {{$user->sms_approve ? "checked" : ""}}>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <span>E-mail yolu ile reklam, pazarlama vb. mailleri almayı kabul ediyorum.</span>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" name="email_approve" type="checkbox"
                                                           id="emailPermission" {{$user->email_approve ? "checked" : ""}}>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-password" role="tabpanel"
                                 aria-labelledby="nav-password-tab">
                                <div class="password__change">
                                    <div class="password__change-top">
                                        <h3 class="password__change-title">Şifre Değiştir</h3>
                                    </div>
                                    <div class="password__form white-bg">
                                        <form class="form-submit"
                                              action="{{route("front.profil.updatePassword",["id" => $user->id])}}"
                                              method="POST">
                                            @csrf
                                            @method("PUT")

                                            <div class="password__input">
                                                <p>Yeni Şifre</p>
                                                <input type="password" name="password" placeholder="Yeni Şifre">
                                            </div>
                                            <div class="password__input">
                                                <p>Şifre Tekrar</p>
                                                <input type="password" name="password_confirmation"
                                                       placeholder="Şifre Tekrar">
                                            </div>
                                            <div class="password__input">
                                                <button type="submit" class="tp-btn">Şifremi Güncelle</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-favorite" role="tabpanel" aria-labelledby="nav-favorite-tab">
                                <div class="password__change">
                                    <div class="password__change-top">
                                        <h3 class="password__change-title">Favorilerim</h3>
                                    </div>
                                    <div class="password__form white-bg">
                                        @if ($favorites->count() > 0)
                                            <div class="row favorite__list">
                                                @foreach ($favorites as $favorite)
                                                    <div class="col-md-5 favorite__item">
                                                        <div class="card h-100 shadow-sm">
                                                            <div class="card-header bg-primary text-white">
                                                                <h5 class="card-title mb-0">{{ $favorite->name }}</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <p class="card-text text-muted">{{ $favorite->city }}</p>
                                                            </div>
                                                            <div class="card-footer bg-light d-flex justify-content-between">
                                                                <a target="_blank" href="{{ $favorite->link }}" class="btn btn-outline-primary btn-sm">Detaylar</a>
                                                                <button onclick="removeFavorite({{ $favorite->id }}, this)" class="btn btn-outline-danger btn-sm">Favoriden Kaldır</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="pagination__container">
                                                {{ $favorites->links() }}
                                            </div>
                                        @else
                                            <p class="text-muted">Henüz favorilere eklenmiş bir Kurum yok.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="profile__edit-modal">
        <!-- Modal -->
        <div class="modal fade" id="profile_edit_modal" tabindex="-1" aria-labelledby="profile_edit_modal"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="profile__edit-wrapper">
                        <div class="profile__edit-close">
                            <button type="button" class="profile__edit-close-btn" data-bs-toggle="modal"
                                    data-bs-target="#course_enroll_modal"><i class="fa-light fa-xmark"></i></button>
                        </div>
                        <form action="{{route("front.profil.update",["id" => $user->id])}}" method="POST">
                            @csrf
                            @method("PUT")

                            <div class="profile__edit-input">
                                <p>İsim Soyisim</p>
                                <input type="text" name="name" required placeholder="İsim soyisim"
                                       value="{{$user->name}}">
                            </div>
                            <div class="profile__edit-input">
                                <p>Email</p>
                                <input type="text" name="email" required placeholder="Email adresi"
                                       value="{{$user->email}}">
                            </div>
                            <div class="profile__edit-input">
                                <p>Telefon</p>
                                <input type="text" name="phone" required placeholder="Telefon numarası" maxlength="10"
                                       oninput="formatPhoneNumber(this)" value="{{$user->phone}}">
                            </div>
                            <div class="profile__edit-input">
                                <p>İl</p>
                                <select name="city" data-selected-city="{{ $user->city }}"
                                        id="citySelect" required
                                        onchange="updateDistricts()">
                                    <option value="">Seciniz</option>
                                </select>
                            </div>
                            <div class="profile__edit-input">
                                <p>İlçe</p>
                                <select class="form-control" name="district"
                                        data-selected-district="{{ $user->district}}" required
                                        id="districtSelect">
                                    <option value="">Önce ili seçiniz</option>
                                </select>
                            </div>
                            <div class="profile__edit-input">
                                <button type="submit" class="tp-btn w-100">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .favorite__list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .favorite__item {
            margin-bottom: 20px;
        }

        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            font-size: 18px;
            font-weight: bold;
            padding: 10px 15px;
        }

        .card-body {
            padding: 15px;
            background: #fff;
        }

        .card-footer {
            padding: 10px 15px;
        }

        .btn {
            padding: 5px 15px;
            font-size: 14px;
        }

        .pagination__container {
            margin-top: 20px;
            text-align: center;
        }

        .text-muted {
            color: #6c757d;
        }
    </style>
@endpush

@push('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            var phoneInput = document.getElementById('phone');
            if (phoneInput && phoneInput.value) {
                formatPhoneNumber(phoneInput);
            }

            fetchProvinces();
            formatPhoneNumber();

            $('select').niceSelect();

        });
    </script>
    <script>
        async function removeFavorite(companyId, button) {
            try {
                const response = await fetch("{{ route('front.favorite.toggle') }}", {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    },
                    body: JSON.stringify({ companyId }),
                });

                if (response.ok) {
                    const parentItem = button.closest('.favorite__item');
                    parentItem.remove();
                } else {
                    console.error('İstek başarısız:', response.statusText);
                }
            } catch (error) {
                console.error('Favori kaldırma hatası:', error);
            }
        }
    </script>

@endpush
