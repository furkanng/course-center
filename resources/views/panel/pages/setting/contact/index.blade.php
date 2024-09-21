@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Ayarlar</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">İletişim Ayarları</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">İletişim Ayarları</h6>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-9 col-12 mx-auto">
            <div class="card card-body mt-4">
                <h6 class="mb-0">İletişim Yapılandırılması</h6>
                <p class="text-sm mb-0">Proje içerisindeki iletişim bilgilerinizi giriniz.</p>
                <hr class="horizontal dark my-3">

                <form class="form-submit" action="{{route("panel.setting.contact.store")}}" method="POST">
                    @csrf

                    <div class="mt-4">
                        <label for="projectName" class="form-label">İletişim Başlık</label>
                        <input type="text" name="contact_title" value="{{\App\Models\Setting::get("contact_title")}}"
                               class="form-control">
                    </div>

                    <div class="mt-4">
                        <label for="projectName" class="form-label">Telefon</label>
                        <input type="text" name="contact_phone" value="{{\App\Models\Setting::get("contact_phone")}}"
                               class="form-control">
                    </div>

                    <div class="mt-4">
                        <label for="projectName" class="form-label">Fax</label>
                        <input type="text" name="contact_fax" value="{{\App\Models\Setting::get("contact_fax")}}"
                               class="form-control">
                    </div>

                    <div class="mt-4">
                        <label for="projectName" class="form-label">Eposta Adresi</label>
                        <input type="email" name="contact_email" value="{{\App\Models\Setting::get("contact_email")}}"
                               class="form-control">
                    </div>

                    <div class="mt-4">
                        <label for="projectName" class="form-label">Adres</label>
                        <textarea type="text" name="contact_address"
                                  class="form-control">{!! \App\Models\Setting::get("contact_address") !!}
                        </textarea>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" name="button" class="btn bg-gradient-primary m-0 ms-2">Kaydet</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
