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

    <div class="row mt-4">
        <script src="https://www.paytr.com/js/iframeResizer.min.js"></script>
        <iframe src="https://www.paytr.com/odeme/guvenli/{{$token}}" id="paytriframe" frameborder="0"
                scrolling="no" style="width: 100%;"></iframe>
        <script>iFrameResize({},'#paytriframe');</script>
    </div>

@endsection

@push('scripts')

@endpush

