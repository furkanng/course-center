@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Site Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Reklam Satın Al</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Reklam Satın Al</h6>
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="multisteps-form">
                <div class="row">
                    <div class="col-12 col-lg-8 mx-auto mt-4 mb-sm-5 mb-3">
                        <div class="multisteps-form__progress">
                            <button class="multisteps-form__progress-btn js-active" type="button" title="Product Info">
                                <span>1. Fatura Bilgileri</span>
                            </button>
                            <button class="multisteps-form__progress-btn" type="button" title="Socials">
                                2. Kurum Seçimi
                            </button>
                            <button class="multisteps-form__progress-btn" type="button" title="Pricing">
                                3. Sipariş Özeti
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8 m-auto">
                        <form method="POST"
                              action="{{route("merchant.finance.plans.payment",["plan_id" => $plan->id])}}"
                              class="multisteps-form__form mb-8 form-submit">
                            @csrf
                            <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active"
                                 data-animation="FadeIn">
                                <h5 class="font-weight-bolder">Fatura Bilgisi</h5>
                                <div class="multisteps-form__content">
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6">
                                            <label>İsim Soyisim *</label>
                                            <input class="multisteps-form__input form-control" type="text"
                                                   name="name" required/>
                                        </div>
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <label>E Mail *</label>
                                            <input class="multisteps-form__input form-control" type="email"
                                                   name="email" required/>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6">
                                            <label>İl *</label>
                                            <select class="multisteps-form__input form-control" name="city"
                                                    id="citySelect" required
                                                    onchange="updateDistricts()">
                                                <option value="">Seciniz</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <label>İlçe *</label>
                                            <select class="multisteps-form__input form-control" name="district" required
                                                    id="districtSelect">
                                                <option value="">Önce ili seçiniz</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6">
                                            <label>Telefon *</label>
                                            <input class="multisteps-form__input form-control" name="phone" type="text"
                                                   oninput="formatPhoneNumber(this)" maxlength="10" required/>
                                        </div>
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <label>Posta Kodu *</label>
                                            <input class="multisteps-form__input form-control" type="text"
                                                   name="postal_code" required/>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6">
                                            <label>Adres *</label>
                                            <input class="multisteps-form__input form-control" type="text"
                                                   name="address" required/>
                                        </div>
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <label>Sipariş Notları (Opsiyonel)</label>
                                            <input class="multisteps-form__input form-control" type="text"
                                                   name="order_notes"/>
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
                                <h5 class="font-weight-bolder">Kurum Seçimi</h5>
                                <small class="form-text text-muted">Not: Seçtiğiniz her kurum, bir reklam adedi olarak
                                    değerlendirilecektir.</small>

                                <div class="multisteps-form__content">
                                    <div class="row mt-3">
                                        <div class="col-12 mt-3">
                                            <label for="companies">Kurumlar</label>
                                            <select class="form-control" name="companies[]" required id="companies" multiple>
                                                @foreach(auth()->user()->companies as $company)
                                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                @endforeach
                                            </select>
                                            <small class="form-text text-muted">Birden fazla kurum seçmek için CTRL
                                                (veya CMD) tuşunu basılı tutarak seçebilirsiniz.</small>
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
                                <h5 class="font-weight-bolder">Sipariş Özeti</h5>
                                <div class="multisteps-form__content mt-3">
                                    <hr class="horizontal dark">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>Reklam Adı</span>
                                            <span>{{$plan->name}}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>Reklam Adedi</span>
                                            <span id="ad-count">0</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                            <span>Toplam</span>
                                            <span id="total-price">{{$plan->price}} ₺</span>
                                        </li>
                                    </ul>
                                    <div class="button-row d-flex mt-4">
                                        <button class="btn bg-gradient-secondary mb-0 js-btn-prev" type="button"
                                                title="Prev">Geri
                                        </button>
                                        <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" title="Send">
                                            Siparişi Tamamla
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
        document.addEventListener("DOMContentLoaded", function () {
            const companiesSelect = document.getElementById('companies');
            const adCountElement = document.getElementById('ad-count');
            const totalPriceElement = document.getElementById('total-price');
            const planPrice = {{ $plan->price }}; // Plan fiyatı

            function updateSummary() {
                // Seçilen kurum sayısını al
                const selectedCount = companiesSelect.selectedOptions.length;

                // Reklam adetini güncelle
                adCountElement.textContent = selectedCount;

                // Toplam fiyatı güncelle
                totalPriceElement.textContent = `₺ ${selectedCount * planPrice}`;
            }

            // Seçim değiştiğinde özet kısmını güncelle
            companiesSelect.addEventListener('change', updateSummary);

            // Sayfa yüklendiğinde varsayılan hesaplama
            updateSummary();
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const nextButtons = document.querySelectorAll('.js-btn-next'); // Tüm "İleri" butonlarını seç
            const requiredInputs = document.querySelectorAll('input[required], select[required], textarea[required]'); // Required alanları seç

            // Form alanlarını kontrol eden bir fonksiyon
            function checkFormCompletion() {
                const currentPanel = document.querySelector('.multisteps-form__panel.js-active'); // Aktif panel
                const inputs = currentPanel.querySelectorAll('input[required], select[required], textarea[required]'); // Paneldeki required alanlar
                const nextButton = currentPanel.querySelector('.js-btn-next'); // Paneldeki İleri butonu

                let allFilled = true;

                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        allFilled = false;
                    }
                });

                if (allFilled) {
                    nextButton.removeAttribute('disabled'); // Tüm alanlar doluysa butonu aktif yap
                } else {
                    nextButton.setAttribute('disabled', 'disabled'); // Alanlar eksikse butonu devre dışı bırak
                }
            }

            // Sayfa yüklendiğinde tüm İleri butonlarını başlangıçta devre dışı bırak
            nextButtons.forEach(button => {
                button.setAttribute('disabled', 'disabled');
            });

            // Required alanlarda değişiklik olduğunda kontrol et
            requiredInputs.forEach(input => {
                input.addEventListener('input', checkFormCompletion);
            });

            // İlk kontrol
            checkFormCompletion();
        });
    </script>
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

