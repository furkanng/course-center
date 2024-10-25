@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kurum Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kurumlar</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kurum Talep Listesi</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Talep Detay</h6>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-number-input" class="form-control-label">Kurum Adı</label>
                                <input class="form-control" disabled type="text" style="width: 100%"
                                       value="{{$request->company->name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-number-input" class="form-control-label">Mernis No</label>
                                <input class="form-control" disabled type="text" style="width: 100%"
                                       value="{{$request->company->mernis}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-number-input" class="form-control-label">Adres</label>
                                <input class="form-control" disabled type="text" style="width: 100%"
                                       value="{{$request->company->address}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-number-input" class="form-control-label">Kurum Tipi</label>
                                <input class="form-control" disabled type="text" style="width: 100%"
                                       value="{{$request->company->getCompanyTypeName()}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-number-input" class="form-control-label">İl</label>
                                <input class="form-control" disabled type="text" style="width: 100%"
                                       value="{{$request->company->city}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-number-input" class="form-control-label">İlçe</label>
                                <input class="form-control" disabled type="text" style="width: 100%"
                                       value="{{$request->company->district}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8 col-xl-6 mt-sm-0 mt-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Evraklar</h6>
                    <p class="form-text text-muted text-xs ms-1 d-inline">
                        Kurumun sizin olduğunu beyan etmek için istenen evrakları yükleyiniz
                    </p>
                </div>
                <div class="card-body p-3">
                    <form action="{{route("merchant.companies.my-request.update",["id" => $request->id])}}"
                          method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")

                        <div class="form-group">
                            <label for="id_card_front" class="form-control-label">Kimlik Ön Yüzü</label>
                            <input id="id_card_front" class="form-control" type="file" style="width: 100%"
                                   name="id_card_front">

                            @if($request->id_card_front)
                                <div class="mt-2">
                                    <p class="text-sm mb-0">Yüklenen Dosya:
                                        <a href="{{ $request->id_card_front }}"
                                           target="_blank">
                                            Kimlik Ön Yüzü Görüntüle
                                        </a>
                                    </p>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="id_card_back" class="form-control-label">Kimlik Arka Yüzü</label>
                            <input id="id_card_back" class="form-control" type="file" style="width: 100%"
                                   name="id_card_back">

                            @if($request->id_card_back)
                                <div class="mt-2">
                                    <p class="text-sm mb-0">Yüklenen Dosya:
                                        <a href="{{ $request->id_card_back }}"
                                           target="_blank">
                                            Kimlik Arka Yüzü Görüntüle
                                        </a>
                                    </p>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="permit" class="form-control-label">Ruhsat</label>
                            <input id="permit" class="form-control" type="file" style="width: 100%" name="permit">

                            @if($request->permit)
                                <div class="mt-2">
                                    <p class="text-sm mb-0">Yüklenen Dosya:
                                        <a href="{{ $request->permit }}"
                                           target="_blank">
                                            Ruhsat Görüntüle
                                        </a>
                                    </p>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="proxy" class="form-control-label">Vekaletname</label>
                            <input id="proxy" class="form-control" type="file" style="width: 100%"
                                   name="proxy">

                            @if($request->proxy)
                                <div class="mt-2">
                                    <p class="text-sm mb-0">Yüklenen Dosya:
                                        <a href="{{ $request->proxy }}"
                                           target="_blank">
                                            Vekaletname Görüntüle
                                        </a>
                                    </p>
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn bg-gradient-primary mt-3">Kaydet</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
