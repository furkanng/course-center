@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Site Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Ödeme Bilgilerim</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Ödeme Bilgilerim</h6>
@endsection

@section('content')

    <div class="row mt-4">
        <div class="col-md-8 col-sm-10 mx-auto">
            <div class="card my-sm-5" id="print-area">
                <div class="card-header text-center">
                    <div class="row justify-content-between">
                        <div class="col-md-4 text-start">
                            <img class="mb-2 w-50 p-2 logo" src="{{$image["logo"]}}" alt="Logo">
                            <h6>
                                {{$settings["contact_address"]}}
                            </h6>
                            <p class="d-block text-secondary">Tel: {{$settings["contact_phone"]}}</p>
                        </div>
                        <div class="col-lg-3 col-md-7 text-md-end text-start mt-5">
                            <h6 class="d-block mt-2 mb-0">{{json_decode($order["shipping_address"],true)["name"]}}</h6>
                            <p class="text-secondary">{{json_decode($order["shipping_address"],true)["address"]}}<br>
                                {{json_decode($order["shipping_address"],true)["city"]}}<br>
                                {{json_decode($order["shipping_address"],true)["district"]}}
                            </p>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-md-between">
                        <div class="col-md-4 mt-auto">
                            <h6 class="mb-0 text-start text-secondary">
                                Sipariş Numarası
                            </h6>
                            <h5 class="text-start mb-0">
                                {{$order["code"]}}
                            </h5>
                        </div>
                        <div class="col-lg-5 col-md-7 mt-auto">
                            <div class="row mt-md-5 mt-4 text-md-end text-start">
                                <div class="col-md-6">
                                    <h6 class="text-secondary mb-0">Sipariş Tarihi:</h6>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-dark mb-0">{{ $order["created_at"]->format('d.m.Y') }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table text-right">
                                    <thead class="bg-default">
                                    <tr>
                                        <th scope="col" class="pe-2 text-start ps-2">Reklam Adı</th>
                                        <th scope="col" class="pe-2" colspan="2">Reklam Adedi</th>
                                        <th scope="col" class="pe-2" colspan="2"></th>
                                        <th scope="col" class="pe-2">Fiyat</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-start">{{$order->plan->name}}</td>
                                        <td class="ps-4" colspan="2">{{$order->piece}} Kurum</td>
                                        <td class="ps-4" colspan="2"></td>
                                        <td class="ps-4">{{$order->price}} ₺</td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="2"></th>
                                        <th></th>
                                        <th class="h5 ps-4" colspan="2">Toplam</th>
                                        <th colspan="1" class="text-right h5 ps-4">{{$order->price}} ₺</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer mt-md-5 mt-4">
                    <div class="row">
                        <div class="col-lg-5 text-left">
                            <h5>{{$language["text_18"]}}</h5>
                            <p class="text-secondary text-sm">{{$language["text_19"]}}</p>
                            <h6 class="text-secondary mb-0">
                                E Mail:
                                <span class="text-dark">{{$settings["contact_email"]}}</span>
                            </h6>
                        </div>
                        <div class="col-lg-7 text-md-end mt-md-0 mt-3 btn-print">
                            <button class="btn bg-gradient-info mt-lg-7 mb-0" onClick="window.print()" type="button"
                                    name="button">Yazdır
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <style>
        @media print {
            /* Yazdırma sırasında gizlemek istediğiniz öğeler */
            body * {
                visibility: hidden; /* Tüm öğeleri gizle */
            }

            .card {
                visibility: visible; /* Yalnızca kart görünsün */
            }

            .card * {
                visibility: visible; /* Kart içindeki tüm öğeler görünür */
            }

            @page {
                margin: 0; /* Tüm kenar boşluklarını kaldır */
            }

            /* Kartı tam sayfa olarak hizala */
            .card {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
            }

            /* Yazdırma sırasında butonları gizle */
            .btn-print {
                display: none;
            }
        }
    </style>
@endpush

