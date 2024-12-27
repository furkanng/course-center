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
        <!-- Sipariş Formu -->
        <div class="col-lg-8 col-md-7 col-12">
            <div class="card card-body mt-4">
                <h6 class="mb-0">Sipariş Bilgileri</h6>
                <p class="text-sm mb-0">Lütfen sipariş bilgilerinizi eksiksiz doldurunuz.</p>
                <hr class="horizontal dark my-3">

                <form class="form-submit" action="{{route("merchant.finance.plans.payment",["plan_id" => $plan->id])}}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="form-label">İsim</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Adınız">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email"
                                   placeholder="Email Adresiniz">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <label for="address" class="form-label">Adres</label>
                            <input type="text" name="address" class="form-control" id="address"
                                   placeholder="Adresinizi giriniz">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <label for="city" class="form-label">Şehir</label>
                            <input type="text" name="city" class="form-control" id="city"
                                   placeholder="Şehir Giriniz">
                        </div>
                        <div class="col-md-6">
                            <label for="district" class="form-label">İlçe</label>
                            <input type="text" name="district" class="form-control" id="district"
                                   placeholder="İlçe Giriniz">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <label for="postal_code" class="form-label">Posta Kodu</label>
                            <input type="text" name="postal_code" class="form-control" id="postal_code"
                                   placeholder="Posta Kodu">
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Telefon</label>
                            <input type="text" name="phone" class="form-control" id="phone"
                                   placeholder="Telefon Numaranız">
                        </div>
                    </div>
                    {{--
                      <div class="form-check mt-4">
                        <input type="checkbox" class="form-check-input" id="different_billing" name="different_billing">
                        <label class="form-check-label" for="different_billing">Fatura Adresim Farklı</label>
                    </div>
                    --}}

                    <div class="mt-4">
                        <label for="order_notes" class="form-label">Sipariş Notları (Opsiyonel)</label>
                        <textarea name="order_notes" class="form-control" id="order_notes" rows="3"
                                  placeholder="Sipariş ile ilgili notlarınızı yazabilirsiniz"></textarea>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn bg-gradient-primary">Siparişi Tamamla</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sipariş Özeti -->
        <div class="col-lg-4 col-md-5 col-12">
            <div class="card card-body mt-4">
                <h6 class="mb-0">Sipariş Özeti</h6>
                <hr class="horizontal dark my-3">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>Ürün Adı</span>
                        <span>{{$plan->name}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                        <span>Toplam</span>
                        <span>₺ {{$plan->price}}</span>
                    </li>
                </ul>
                <div class="mt-4">
                    <label for="coupon" class="form-label">Kupon Kodu</label>
                    <div class="d-flex">
                        <input type="text" class="form-control" id="coupon" placeholder="Kupon kodunuzu girin">
                        <button class="btn bg-gradient-primary ms-2">Kullan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('scripts')

@endpush

