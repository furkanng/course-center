@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Ayarlar</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Email Ayarları</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Email Ayarları</h6>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-9 col-12 mx-auto">
            <div class="card card-body mt-4">
                <h6 class="mb-0">E Mail Yapılandırılması</h6>
                <p class="text-sm mb-0">Proje içerisindeki email servisini yapılandırabilirsiniz</p>
                <hr class="horizontal dark my-3">

                <form class="form-submit" action="{{route("panel.setting.email.store")}}" method="POST">
                    @csrf

                    <div class="mt-4">
                        <label for="projectName" class="form-label">Mail Sürücü</label>
                        <input type="text" name="mailer_driver" value="{{\App\Models\Setting::get("mailer_driver")}}"
                               class="form-control" id="projectName">
                    </div>

                    <div class="mt-4">
                        <label for="projectName" class="form-label">Mail Host</label>
                        <input type="text" name="mailer_host" value="{{\App\Models\Setting::get("mailer_host")}}"
                               class="form-control" id="projectName">
                    </div>

                    <div class="mt-4">
                        <label for="projectName" class="form-label">Mail Kullanıcı Adı</label>
                        <input type="text" name="mailer_username"
                               value="{{\App\Models\Setting::get("mailer_username")}}"
                               class="form-control" id="projectName">
                    </div>

                    <div class="mt-4">
                        <label for="projectName" class="form-label">Mail Şifre</label>
                        <input type="text" name="mailer_password"
                               value="{{\App\Models\Setting::get("mailer_password")}}"
                               class="form-control" id="projectName">
                    </div>

                    <div class="mt-4">
                        <label for="projectName" class="form-label">Mail Encryption</label>
                        <input type="text" name="mailer_encryption"
                               value="{{\App\Models\Setting::get("mailer_encryption")}}"
                               class="form-control" id="projectName">
                    </div>

                    <div class="mt-4">
                        <label for="projectName" class="form-label">Mail Port</label>
                        <input type="text" name="mailer_port" value="{{\App\Models\Setting::get("mailer_port")}}"
                               class="form-control" id="projectName">
                    </div>

                    <div class="mt-4">
                        <label for="projectName" class="form-label">Mail Gönderen Adres</label>
                        <input type="text" name="mailer_from_address"
                               value="{{\App\Models\Setting::get("mailer_from_address")}}"
                               class="form-control" id="projectName">
                    </div>

                    <div class="mt-4">
                        <label for="projectName" class="form-label">Mail Gönderen İsim</label>
                        <input type="text" name="mailer_from_name"
                               value="{{\App\Models\Setting::get("mailer_from_name")}}"
                               class="form-control" id="projectName">
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" name="button" class="btn bg-gradient-primary m-0 ms-2">Kaydet</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
