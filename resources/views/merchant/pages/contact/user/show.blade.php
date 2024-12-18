@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Talepler</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kullanıcı Talepleri</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Talep Kullanıcı Bilgisi</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Talep Kullanıcı Bilgisi</h6>
@endsection

@section('content')
    <div class="row mt-3">
        <div class="col-12 col-md-8 col-xl-6">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Talep Detayları</h6>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-number-input" class="form-control-label">İsim Soyisim</label>
                                <input class="form-control" type="text" name="name" style="width: 100%"
                                       value="{{$user->customer_name}}"
                                       id="name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-number-input" class="form-control-label">Email</label>
                                <input class="form-control" type="text" name="email" style="width: 100%"
                                       value="{{$user->customer_email}}"
                                       id="email">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-number-input" class="form-control-label">Telefon</label>
                                <input class="form-control" type="text" name="phone" style="width: 100%"
                                       value="{{$user->customer_phone}}"
                                       id="phone">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-number-input" class="form-control-label">Mesaj</label>
                                <input class="form-control" type="text" name="phone" style="width: 100%"
                                       value="{{$user->customer_content}}"
                                       id="phone">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
