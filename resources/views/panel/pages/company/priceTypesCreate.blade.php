@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kurumlar</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;}">Kurum Fiyat Tipleri</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kurum Fiyat Tipi Ekle</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Kurum Fiyat Tipi Ekle</h6>
@endsection

@section('content')

    <div class="row mt-3">
        <div class="col-12 col-md-8 col-xl-6">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Kurum Fiyat Tipi Detayları</h6>
                </div>
                <div class="card-body p-3">
                    <form class="form-submit" method="POST"
                          action="{{route("panel.companies.price_types.store")}}">
                        @csrf
                        <div class="form-group">
                            <label for="course">Fiyat Başlığı</label>
                            <input type="text" class="form-control"
                                   name="price_title" id="price_title" placeholder="Fiyat Başlığı">

                        </div>


                        <div class="form-group">
                            <div class="form-check form-switch">
                                <input class="form-check-input" name="status" type="checkbox"
                                       id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Durum</label>
                            </div>
                        </div>

                        <button type="submit" class="btn bg-gradient-primary my-2">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush

