@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Site Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Ödeme Yap</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Ödeme Yap</h6>
@endsection

@section('content')
    <div class="card">
        <div class="card-body text-center">
            <h1 class="text-success"><i class="fas fa-check-circle"></i></h1>
            <h3 class="mt-3">Ödemeniz Başarıyla Tamamlandı!</h3>
            <p class="text-muted">
                Ödemeniz başarıyla gerçekleştirilmiştir. Sipariş detaylarınızı kontrol etmek için <a href="">sipariş geçmişi</a> sayfasını ziyaret edebilirsiniz.
            </p>
            <a href="{{ route('merchant.home') }}" class="btn btn-primary mt-3">Ana Sayfaya Dön</a>
        </div>
    </div>
@endsection

@push('scripts')

@endpush

