@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kurum Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="{{route("panel.companies.company.index")}}">Kurum Listesi</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kurum Düzenle</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Kurum Düzenle</h6>
@endsection

@section('content')
    <form class="form-submit" action="{{route("panel.companies.company.update",["id" => $company->id])}}" method="POST"
          enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div id="form">

            <div class="row">
                <div class="col-lg-6">
                    <h4>Kurum bilgileri</h4>
                    <p>Sistem üzerinde var olan kurum ile alakalı düzenlemeleri yapabilirsiniz.</p>
                </div>
                <div class="col-lg-6 text-right d-flex flex-column justify-content-center">
                    <button type="submit" class="btn bg-gradient-primary mb-0 ms-lg-auto me-lg-0 me-auto mt-lg-0 mt-2">
                        Kaydet
                    </button>
                </div>
            </div>


            <div class="row mt-4">
                <div class="col-lg-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="font-weight-bolder">Kapak Resmi</h5>
                            <p class="form-text text-muted text-xs ms-1 d-inline">
                                (Yatay yüksek kaliteli resimler tercih ediniz)
                            </p>
                            <div class="row">

                                @if(is_null($company->image) || empty($company->image))
                                    <div class="col-12">
                                        <img class="w-100 border-radius-lg shadow-lg mt-3"
                                             src="{{ \App\Service\Helper::getNoImage()}}"
                                             alt="kapak_resmi">
                                    </div>
                                @else
                                    <div class="col-12">
                                        <img class="w-100 border-radius-lg shadow-lg mt-3"
                                             src="{{ $company->image_url }}"
                                             alt="kapak_resmi">
                                    </div>
                                @endif

                                <div class="col-12 mt-4">
                                    <div class="d-flex">
                                        <form>
                                            <input type="file" name="image" class="form-control" id="image-input"
                                                   hidden>
                                            <button class="btn bg-gradient-primary btn-sm mb-0 me-2" type="button"
                                                    id="upload-button">
                                                Yükle
                                            </button>
                                        </form>

                                        <button class="btn btn-outline-dark btn-sm mb-0"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteModal-{{ $company->id }}">
                                            Kaldır
                                        </button>
                                    </div>
                                </div>
                                <x-delete-modal modalId="deleteModal-{{ $company->id }}"
                                                title="Silme Onayı"
                                                body="Bu öğeyi silmek istediğinizden emin misiniz?"
                                                action="{{ route('panel.companies.company.image.delete', ['id' => $company->id]) }}">
                                </x-delete-modal>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mt-lg-0 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="font-weight-bolder">Genel Bilgiler</h5>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>Kurum Adı</label>
                                    <input class="form-control" name="name" type="text" value="{{$company->name}}"/>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>Kurum Tipi</label>
                                    <select class="form-control" name="company_type" id="choices-category-edit">
                                        @foreach($companyTypes as $companyType)
                                            <option value="{{$companyType->code}}"
                                                {{$company->company_type === $companyType->code ? "selected" : ""}}>
                                                {{$companyType->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <label class="mt-4">İl</label>
                                    <select class="form-control" name="city" data-selected-city="{{ $company->city }}"
                                            id="citySelect" required
                                            onchange="updateDistricts()">
                                        <option value="">Seciniz</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label class="mt-4">İlçe</label>
                                    <select class="form-control" name="district"
                                            data-selected-district="{{ $company->district}}" required
                                            id="districtSelect">
                                        <option value="">Önce ili seçiniz</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label class="mt-4">Mernis</label>
                                    <input class="form-control" name="mernis" type="text" value="{{$company->mernis}}"/>
                                </div>
                                <div class="col-3">
                                    <label class="mt-4">Durum</label>
                                    <select class="form-control" name="status" required>
                                        <option value="1" {{$company->status == 1 ? 'selected' : ''}}>Aktif</option>
                                        <option value="0" {{$company->status == 0 ? 'selected' : ''}}>Pasif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="mt-4">Adres</label>
                                    <textarea class="form-control" type="text" name="address"
                                              id="address">{!! $company->address !!}</textarea>
                                </div>
                                <div class="col-sm-6">

                                    <label class="mt-4">Website</label>
                                    <input class="form-control" name="website" type="text"
                                           value="{{$company->website}}"/>

                                    <label class="mt-2">Telefon</label>
                                    <input class="form-control" name="phone" id="phone" type="text"
                                           oninput="formatPhoneNumber(this)" maxlength="10"
                                           value="{{$company->phone}}"/>

                                    <label class="mt-2">Fax</label>
                                    <input class="form-control" name="fax" id="fax" type="text"
                                           oninput="formatPhoneNumber(this)" maxlength="10" value="{{$company->fax}}"/>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="font-weight-bolder">Sosyal Medya</h5>
                            <label class="mt-4">Facebook</label>
                            <input class="form-control" type="text" name="facebook"
                                   value="{{$company->info?->facebook}}"/>
                            <label class="mt-2">Instagram</label>
                            <input class="form-control" type="text" name="instagram"
                                   value="{{$company->info?->instagram}}"/>
                            <label class="mt-2">X</label>
                            <input class="form-control" type="text" name="twitter"
                                   value="{{$company->info?->twitter}}"/>
                            <label class="mt-2">Youtube</label>
                            <input class="form-control" type="text" name="youtube"
                                   value="{{$company->info?->youtube}}"/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 mt-sm-0 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="font-weight-bolder mb-4">Kurum Hakkında</h5>
                                    <div id="edit-about-edit" class="h-50 mb-4">
                                        {!! $company->info?->about !!}
                                    </div>
                                    <input type="hidden" name="about" id="about">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="font-weight-bolder mb-4">Kurslar</h5>
                                    <select class="form-control" name="courses[]" id="choices-tags-edit" multiple>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}"
                                                {{ in_array($course->id, $company->courses->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                {{ $course->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="font-weight-bolder">Konum</h5>
                            <label class="mt-4">Google Harita Kodu</label>
                            <input class="form-control" type="text" name="map" value="{{$company->info?->map}}"/>

                            <div class="mt-4">
                                <div
                                    style="position: relative; padding-bottom: 56.25%;overflow: hidden; max-width: 100%; height: auto;">
                                    <iframe
                                        src="{{$company->info?->map}}"
                                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 1px solid gray;"
                                        allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header pb-0 p-3">
                            <div class="d-flex justify-content-between">
                                <h5 class="font-weight-bolder">Soru Cevap</h5>
                                <button type="button" class="btn bg-gradient-success btn-sm btn-block"
                                        data-bs-toggle="modal" data-bs-target="#sssFormModalCreate">
                                    Ekle
                                </button>
                            </div>
                            <p class="form-text text-muted text-xs ms-1 d-inline">
                                (Kaydedilmeyen değişiklikleriniz varsa önce kaydediniz.)
                            </p>
                            <x-sss-form-modal
                                modalId="sssFormModalCreate"
                                action="{{ route('panel.companies.sss.store',['company' => $company->id]) }}"
                                method="POST"
                                question=""
                                answer=""
                                status=""
                                order="">
                            </x-sss-form-modal>
                        </div>
                        <div class="card-body p-3">
                            <ul class="list-group">
                                @foreach($sss as $entity)
                                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                                <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                                                     xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     class="mt-1">
                                                    <title>box-3d-50</title>
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(-2319.000000, -291.000000)"
                                                           fill="#FFFFFF"
                                                           fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(603.000000, 0.000000)">
                                                                    <path
                                                                        d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z"></path>
                                                                    <path
                                                                        d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z"
                                                                        opacity="0.7"></path>
                                                                    <path
                                                                        d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z"
                                                                        opacity="0.7"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-1 text-dark text-sm">{{substr($entity->question,0,40)}}</h6>
                                                <span class="text-xs">{{substr($entity->answer,0,45)}}</span>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <button
                                                type="button" data-bs-toggle="modal"
                                                data-bs-target="#sssFormModalEdit{{$entity->id}}"
                                                class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
                                                <i class="ni ni-bold-right" aria-hidden="true"></i>
                                            </button>
                                            <x-sss-form-modal
                                                modalId="sssFormModalEdit{{$entity->id}}"
                                                action="{{ route('panel.companies.sss.update',['id' => $entity->id]) }}"
                                                method="PUT"
                                                question="{{$entity->question}}"
                                                answer="{{$entity->answer}}"
                                                status="{{$entity->status}}"
                                                order="{{$entity->order}}">
                                            </x-sss-form-modal>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8 mt-sm-0 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <h5 class="font-weight-bolder mb-4">Kurum İmkanları</h5>

                                @foreach($menuStructure as $mainMenu)
                                    <h6 class="font-weight-bold">{{ $mainMenu->name }}</h6>
                                    <div class="submenu-wrapper">
                                        @foreach($mainMenu->subMenus as $subMenu)
                                            <div class="form-check ml-4">
                                                <label class="form-check-label">{{ $subMenu->name }}</label>
                                                <input class="form-check-input" type="checkbox" name="features[]"
                                                       value="{{ $subMenu->id }}" {{ in_array($subMenu->id, $companyFeatures) ? 'checked' : '' }}>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row mt-lg-4">
        <div class="col-sm-12 mt-sm-0 mt-4">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h5 class="font-weight-bolder mb-4">Fiyat Bilgileri</h5>
                        <p class="form-text text-muted text-xs ms-1 d-inline">
                            (Kaydedilmeyen değişiklikleriniz varsa önce kaydediniz.)
                        </p>
                        <button type="button" class="btn bg-gradient-success btn-sm btn-block"
                                data-bs-toggle="modal" data-bs-target="#priceFormModalCreate">
                            Ekle
                        </button>
                    </div>
                    <x-price-form-modal
                        modalId="priceFormModalCreate"
                        action="{{ route('panel.companies.price.store',['company' => $company->id]) }}"
                        method="POST"
                        title=""
                        price=""
                        discounted=""
                        status="">
                    </x-price-form-modal>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Başlık
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Fiyat
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    İndirimli Fiyat
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Durum
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Güncelleme Tarihi
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Düzenle
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($prices as $price)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$price->price_title->label()}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm text-secondary mb-0">{{$price->price}}</p>
                                    </td>
                                    <td>
                                        <p class="text-secondary mb-0 text-sm">{{$price->discounted_price ?? "Yok"}}</p>
                                    </td>
                                    <td>
                                    <span class="badge badge-dot me-4">
                                        <i class="{{$price->status ? "bg-info": "bg-danger"}}"></i>
                                        <span class="text-dark text-xs">{{$price->status ? "Aktif" : "Pasif"}}</span>
                                    </span>
                                    </td>
                                    <td>
                                        <span class="text-secondary text-sm">{{$price->updated_at}}</span>
                                    </td>
                                    <td>
                                        <button
                                            type="button" data-bs-toggle="modal"
                                            data-bs-target="#priceFormModalEdit{{$price->id}}"
                                            class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
                                            <i class="fas fa-edit text-secondary text-sm"></i>
                                        </button>
                                        <x-price-form-modal
                                            modalId="priceFormModalEdit{{$price->id}}"
                                            action="{{ route('panel.companies.price.update',['id' => $price->id]) }}"
                                            method="PUT"
                                            title="{{$price->price_title}}"
                                            price="{{$price->price}}"
                                            discounted="{{$price->discounted_price}}"
                                            status="{{$price->status}}">
                                        </x-price-form-modal>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push("style")
    <style>
        .submenu-wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 10px;
            margin-bottom: 20px;
        }
    </style>
@endpush
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let uploadButton = document.getElementById('upload-button');
            let fileInput = document.getElementById('image-input');
            let form = document.getElementById('image-upload-form');

            uploadButton.addEventListener('click', function () {
                fileInput.click();
            });

        });
    </script>

    <script>
        var form = document.querySelector('.form-submit');
        form.addEventListener('submit', function () {
            var aboutInput = document.getElementById('about');
            aboutInput.value = quill.root.innerHTML;
        });
    </script>

    <script>
        if (document.getElementById('edit-deschiption-edit')) {
            var quill = new Quill('#edit-deschiption-edit', {
                theme: 'snow'
            });
        }
        if (document.getElementById('edit-about-edit')) {
            var quill = new Quill('#edit-about-edit', {
                theme: 'snow'
            });
        }

        if (document.getElementById('choices-category-edit')) {
            var element = document.getElementById('choices-category-edit');
            new Choices(element, {
                searchEnabled: false
            });
        }

        if (document.getElementById('choices-color-edit')) {
            var element = document.getElementById('choices-color-edit');
            new Choices(element, {
                searchEnabled: false
            });
        }

        if (document.getElementById('choices-currency-edit')) {
            var element = document.getElementById('choices-currency-edit');
            const example = new Choices(element, {
                searchEnabled: false
            });
        }

        if (document.getElementById('choices-tags-edit')) {
            var tags = document.getElementById('choices-tags-edit');
            new Choices(tags, {
                removeItemButton: true
            });
        }

        var phoneInput = document.getElementById('phone');
        var faxInput = document.getElementById('fax');

        if (phoneInput && phoneInput.value) {
            formatPhoneNumber(phoneInput);
        }

        if (faxInput && faxInput.value) {
            formatPhoneNumber(faxInput);
        }

        fetchProvinces();
        formatPhoneNumber();

        $('select').niceSelect();
    </script>
@endpush

