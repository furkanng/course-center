@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Ayarlar</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Sms Ayarları</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Sms Ayarları</h6>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-9 col-12 mx-auto">
            <div class="card card-body mt-4">
                <h6 class="mb-0">Sms Yapılandırılması</h6>
                <p class="text-sm mb-0">Proje içerisinde kullanılacak olan sms ayarlarınızı yapılandırabilirsiniz</p>
                <hr class="horizontal dark my-3">

                <div class="mt-4">
                    <label for="projectName" class="form-label">Sms Servisi</label>
                    <input type="text" value="Net Gsm" disabled class="form-control" id="projectName">
                </div>

                <form class="form-submit" action="{{route("panel.setting.sms.store")}}" method="POST">
                    @csrf
                    <div class="mt-4">
                        <label for="projectName" class="form-label">Base Url</label>
                        <input type="text" name="sms_base_url" value="{{\App\Models\Setting::get("sms_base_url")}}"
                               class="form-control" id="projectName">
                    </div>

                    <div class="mt-4">
                        <label for="projectName" class="form-label">User Code</label>
                        <input type="text" name="sms_username" value="{{\App\Models\Setting::get("sms_username")}}"
                               class="form-control" id="projectName">
                    </div>

                    <div class="mt-4">
                        <label for="projectName" class="form-label">Password</label>
                        <input type="text" name="sms_password" value="{{\App\Models\Setting::get("sms_password")}}"
                               class="form-control" id="projectName">
                    </div>

                    <div class="mt-4">
                        <label for="projectName" class="form-label">Message Header</label>
                        <input type="text" name="sms_msgHeader" value="{{\App\Models\Setting::get("sms_msg_header")}}"
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
