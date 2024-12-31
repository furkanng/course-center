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
        <div class="col-md-6">
            <div class="card h-100 mb-4">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Ödenmiş faturalarım</h6>
                </div>
                @foreach(auth()->user()->orders()->where("payment_status",\App\Enums\PaymentStatus::PAID->value)->get() as $order)
                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex p-4 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">{{$order->plan_type->label()}}</h6>
                                    <span class="mb-2 text-xs">İsim Soyisim: <span
                                            class="text-dark font-weight-bold ms-sm-2">{{json_decode($order->shipping_address,true)["name"]}}</span></span>
                                    <span class="mb-2 text-xs">E Mail: <span
                                            class="text-dark ms-sm-2 font-weight-bold">{{json_decode($order->shipping_address,true)["email"]}}</span></span>
                                    <span class="text-xs">Sipariş Numarası: <span
                                            class="text-dark ms-sm-2 font-weight-bold">{{$order->code}}</span></span>
                                </div>
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-dark px-3 mb-0"
                                       href="{{route("merchant.account.order.billing",["order_id" => $order->id])}}"><i
                                            class="fas fa-pencil-alt text-dark me-2"
                                            aria-hidden="true"></i>İncele</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-6 mt-md-0 mt-4">
            <div class="card h-100 mb-4">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Ödenmemiş faturalarım</h6>
                </div>
                @foreach(auth()->user()->orders()->where("payment_status",\App\Enums\PaymentStatus::UNPAID->value)->get() as $order)
                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex p-4 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">{{$order->plan_type->label()}}</h6>
                                    <span class="mb-2 text-xs">Fiyat: <span
                                            class="text-dark font-weight-bold ms-sm-2">{{$order->price}} ₺</span></span>
                                    <span class="mb-2 text-xs">Adet: <span
                                            class="text-dark ms-sm-2 font-weight-bold">{{$order->piece}}</span></span>
                                    <span class="text-xs">Sipariş Numarası: <span
                                            class="text-dark ms-sm-2 font-weight-bold">{{$order->code}}</span></span>
                                </div>
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-dark px-3 mb-0"
                                       href="{{route("merchant.account.order.payment",["order_id" => $order->id])}}"><i
                                            class="fas fa-pencil-alt text-dark me-2"
                                            aria-hidden="true"></i>Ödeme Yap</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush

