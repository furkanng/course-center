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
            <h1 class="text-danger"><i class="fas fa-times-circle"></i></h1>
            <h3 class="mt-3">Ödeme İşlemi Başarısız!</h3>
            <p class="text-muted">
                Üzgünüz, ödeme işleminiz tamamlanamadı. Lütfen ödeme bilgilerinizi kontrol edip tekrar deneyin. Sorun devam ederse <a href="">destek ekibimizle</a> iletişime geçebilirsiniz.
            </p>
            <a href="{{ route('merchant.home') }}" class="btn btn-primary mt-3">Ana Sayfaya Dön</a>
        </div>
    </div>
@endsection

@push('scripts')

@endpush

