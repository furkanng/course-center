@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Site Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Reklamlar</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Reklamlar Listesi</h6>
@endsection

@section('content')

    <div class="row mt-4">
        @if(!empty($plans))
            @foreach($plans as $plan)
                <div class="col-4">
                    <div class="card">
                        <div class="card-header p-3 pb-0">
                            <div class="row">
                                <div class="col-8 d-flex">
                                    <div>
                                        <img src="{{asset("images/baykus.png")}}" class="avatar avatar-sm me-2" alt="finance">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{config("app.name")}}</h6>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <span class="badge bg-gradient-info ms-auto float-end">{{$plan->type->label()}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3 pt-1">
                            <h6>{{strtoupper($plan->name)}}</h6>
                            <p class="text-sm">{{$plan->description}}</p>
                            <div class="d-flex bg-gray-100 border-radius-lg p-3">
                                <h4 class="my-auto">
                                    <span class="text-secondary text-sm me-1">₺</span>{{$plan->price}}<span class="text-secondary text-sm ms-1">/ {{$plan->period->label()}} </span>
                                </h4>
                                <a href="{{route("merchant.finance.plans.show",["id" => $plan->id])}}" class="btn btn-outline-dark mb-0 ms-auto">Satın Al</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h3>Henüz bir ödeme planı bulunmuyor</h3>
        @endif
    </div>

@endsection

@push('scripts')

@endpush

