@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kullanıcı Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="{{route("panel.config.plans.index")}}">Ödeme Planları Listesi</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Ödeme Planı Ekle</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Ödeme Planı Ekle</h6>
@endsection

@section('content')

    <div class="row mt-3">
        <div class="col-12 col-md-8 col-xl-6">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Ödeme Planı Detayları</h6>
                </div>
                <div class="card-body p-3">
                    <form class="form-submit" method="POST"
                          action="{{route("panel.config.plans.store")}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="example-number-input" class="form-control-label">Başlık</label>
                                    <input class="form-control" type="text" name="name" style="width: 100%" required
                                           id="name">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="example-number-input" class="form-control-label">Fiyat</label>
                                    <input class="form-control" type="number" name="price" style="width: 100%" required
                                           id="price">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="course">Tip</label>
                                    <select class="form-control" name="type" required>
                                        <option value="{{\App\Enums\PaymentType::MOST_SEARCHED->value}}">
                                            {{\App\Enums\PaymentType::MOST_SEARCHED->label()}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="course">Periyot</label>
                                    <select class="form-control" name="period" required>
                                        @foreach(\App\Enums\PlanPeriod::cases() as $period)
                                            <option value="{{$period->value}}">
                                                {{$period->label()}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label for="example-number-input" class="form-control-label">Açıklama</label>
                                    <textarea class="form-control" type="text" name="description" id="description"
                                              required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="status" type="checkbox"
                                               id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Durum</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn bg-gradient-primary my-2">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
