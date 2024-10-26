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
                    <h6 class="mb-0">Kullanıcı</h6>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-number-input" class="form-control-label">İsim Soyisim</label>
                                <input class="form-control" disabled type="text" style="width: 100%"
                                       value="{{$request->user->name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-number-input" class="form-control-label">E Mail</label>
                                <input class="form-control" disabled type="text" style="width: 100%"
                                       value="{{$request->user->email}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-number-input" class="form-control-label">Telefon</label>
                                <input class="form-control" disabled type="text" style="width: 100%"
                                       value="{{$request->user->phone}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-number-input" class="form-control-label">Kullanıcı Tipi</label>
                                <input class="form-control" disabled type="text" style="width: 100%"
                                       value="{{$request->user->user_type->label()}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-number-input" class="form-control-label">İl</label>
                                <input class="form-control" disabled type="text" style="width: 100%"
                                       value="{{$request->user->city}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-number-input" class="form-control-label">İlçe</label>
                                <input class="form-control" disabled type="text" style="width: 100%"
                                       value="{{$request->user   ->district}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12 col-xl-12">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Talep Belgeleri</h6>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="example-number-input" class="form-control-label">Kimlik Ön Yüzü</label>
                                @if($request->id_card_front)
                                    <a href="{{$request->id_card_front}}" target="_blank">
                                        <button class="btn btn-dark" style="width: 100%">
                                            Görüntüle
                                        </button>
                                    </a>
                                @else
                                    <input class="form-control" disabled type="text" style="width: 100%"
                                           value="Belge Yüklenmedi">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="example-number-input" class="form-control-label">Kimlik Arka Yüzü</label>
                                @if($request->id_card_back)
                                    <a href="{{$request->id_card_back}}" target="_blank">
                                        <button class="btn btn-dark" style="width: 100%">
                                            Görüntüle
                                        </button>
                                    </a>
                                @else
                                    <input class="form-control" disabled type="text" style="width: 100%"
                                           value="Belge Yüklenmedi">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="example-number-input" class="form-control-label">Ruhsat</label>
                                @if($request->permit)
                                    <a href="{{$request->permit}}" target="_blank">
                                        <button class="btn btn-dark" style="width: 100%">
                                            Görüntüle
                                        </button>
                                    </a>
                                @else
                                    <input class="form-control" disabled type="text" style="width: 100%"
                                           value="Belge Yüklenmedi">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="example-number-input" class="form-control-label">Vekaletname</label>
                                @if($request->proxy)
                                    <a href="{{$request->proxy}}" target="_blank">
                                        <button class="btn btn-dark" style="width: 100%">
                                            Görüntüle
                                        </button>
                                    </a>
                                @else
                                    <input class="form-control" disabled type="text" style="width: 100%"
                                           value="Belge Yüklenmedi">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-md-8 col-xl-6">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Talep Düzenleme</h6>
                    <p class="text-sm mb-0">
                        Durum değiştirince kullanıcıya bilgi gidecektir.
                    </p>
                </div>
                <div class="card-body p-3">
                    <form class="form-update" method="POST"
                          action="{{route("panel.companies.request.update",["id" =>$request->id])}}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-number-input" class="form-control-label">Talep Durumu</label>
                                    <div class="sign__input">
                                        <select class="form-control" name="status" required id="status">
                                            @foreach(\App\Enums\UserStatus::cases() as $key)
                                                <option value="{{$key->value}}"
                                                        @if($key === $request->status) selected @endif>
                                                    {{$key->label()}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
