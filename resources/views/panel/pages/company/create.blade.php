@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kurum Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="{{route("panel.companies.company.index")}}">Kurum Listesi</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kurum Düzenle</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Kurum Ekle</h6>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="multisteps-form">
                <div class="row">
                    <div class="col-12 col-lg-8 mx-auto mt-4 mb-sm-5 mb-3">
                        <div class="multisteps-form__progress">
                            <button class="multisteps-form__progress-btn js-active" type="button" title="Product Info">
                                <span>1. Genel Bilgi</span>
                            </button>
                            <button class="multisteps-form__progress-btn" type="button" title="Socials">2. İletişim
                            </button>
                            <button class="multisteps-form__progress-btn" type="button" title="Pricing">3. Konum
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8 m-auto">
                        <form method="POST" action="{{route("panel.companies.company.store")}}"
                              class="multisteps-form__form mb-8 form-submit">
                            @csrf
                            <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active"
                                 data-animation="FadeIn">
                                <h5 class="font-weight-bolder">Genel Bilgi</h5>
                                <div class="multisteps-form__content">
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6">
                                            <label>Kurum Adı *</label>
                                            <input class="multisteps-form__input form-control" type="text"
                                                   name="name" required/>
                                        </div>
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <label>Mernis *</label>
                                            <input class="multisteps-form__input form-control" type="text"
                                                   name="mernis" required/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="mt-4">Adres *</label>
                                            <textarea name="address" id="edit-description"
                                                      class="form-control h-50"></textarea>

                                        </div>
                                        <div class="col-sm-6 mt-sm-0 mt-4">
                                            <label class="mt-4">Kurum Tipi *</label>
                                            <select class="form-control" required name="company_type"
                                                    id="choices-category">
                                                @foreach($companyTypes as $companyType)
                                                    <option value="{{$companyType->code}}">
                                                        {{$companyType->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="button-row d-flex mt-4">
                                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button"
                                                title="Next">İleri
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card multisteps-form__panel p-3 border-radius-xl bg-white"
                                 data-animation="FadeIn">
                                <h5 class="font-weight-bolder">İletişim</h5>
                                <div class="multisteps-form__content">
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <label>Telefon *</label>
                                            <input class="multisteps-form__input form-control" name="phone" type="text"
                                                   oninput="formatPhoneNumber(this)" maxlength="10" required/>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <label>Fax</label>
                                            <input class="multisteps-form__input form-control" name="fax" type="text"
                                                   oninput="formatPhoneNumber(this)" maxlength="10"/>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <label>Website</label>
                                            <input class="multisteps-form__input form-control" name="website"
                                                   type="text"
                                                   placeholder="https://..."/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="button-row d-flex mt-4 col-12">
                                            <button class="btn bg-gradient-secondary mb-0 js-btn-prev" type="button"
                                                    title="Prev">Geri
                                            </button>
                                            <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button"
                                                    title="Next">İleri
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card multisteps-form__panel p-3 border-radius-xl bg-white h-100"
                                 data-animation="FadeIn">
                                <h5 class="font-weight-bolder">Konum</h5>
                                <div class="multisteps-form__content mt-3">

                                    <div class="row">
                                        <div class="col-12">
                                            <label class="mt-4">İl *</label>
                                            <select class="form-control" name="city"
                                                    id="citySelect" required
                                                    onchange="updateDistricts()">
                                                <option value="">Seciniz</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="mt-4">İlçe *</label>
                                            <select class="form-control" name="district" required
                                                    id="districtSelect">
                                                <option value="">Önce ili seçiniz</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="button-row d-flex mt-4">
                                        <button class="btn bg-gradient-secondary mb-0 js-btn-prev" type="button"
                                                title="Prev">Geri
                                        </button>
                                        <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" title="Send">
                                            Kaydet
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetchProvinces();
            formatPhoneNumber();
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
        if (document.getElementById('choices-tags')) {
            var tags = document.getElementById('choices-tags');
            const examples = new Choices(tags, {
                removeItemButton: true
            });
        }
    </script>
@endpush

