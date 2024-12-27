@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kullanıcı Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="{{route("panel.config.most-search.index")}}">En Çok Arananlar Listesi</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">En Çok Aranan Ekle</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">En Çok Aranan Ekle</h6>
@endsection

@section('content')

    <div class="row mt-3">
        <div class="col-12 col-md-8 col-xl-6">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Kullanıcı Detayları</h6>
                </div>
                <div class="card-body p-3">
                    <form class="form-submit" method="POST"
                          action="{{route("panel.config.most-search.store")}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label for="example-number-input" class="form-control-label">Kurum ID</label>
                                    <input class="form-control" type="number" name="company_id" style="width: 100%"
                                           id="company_id">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label for="remaining_date" class="form-control-label">Bitiş Tarihi (Sınırsız için boş bırakınız)</label>
                                    <input class="form-control" type="datetime-local" name="remaining_date" id="remaining_date" style="width: 100%;">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-number-input" class="form-control-label">Sıra</label>
                                    <input class="form-control" type="number" name="order" style="width: 100%"
                                           id="order">
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
