@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Ayarlar</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Sosyal Medya Ayarları</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Sosyal Medya Ayarları</h6>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-9 col-12 mx-auto">
            <div class="card card-body mt-4">
                <h6 class="mb-0">Sosyal Medya Yapılandırılması</h6>
                <p class="text-sm mb-0">Sosyal medya profil linklerinizi giriniz</p>
                <hr class="horizontal dark my-3">

                <form class="form-submit" action="{{route("panel.setting.social-media.store")}}" method="POST">
                    @csrf

                    <div class="mt-4">
                        <label for="projectName" class="form-label">Facebook</label>
                        <input type="text" name="media_facebook" value="{{\App\Models\Setting::get("media_facebook")}}"
                               class="form-control" id="projectName">
                    </div>

                    <div class="mt-4">
                        <label for="projectName" class="form-label">İnstagram</label>
                        <input type="text" name="media_instagram" value="{{\App\Models\Setting::get("media_instagram")}}"
                               class="form-control" id="projectName">
                    </div>

                    <div class="mt-4">
                        <label for="projectName" class="form-label">Twitter</label>
                        <input type="text" name="media_twitter" value="{{\App\Models\Setting::get("media_twitter")}}"
                               class="form-control" id="projectName">
                    </div>

                    <div class="mt-4">
                        <label for="projectName" class="form-label">Linkedin</label>
                        <input type="text" name="media_linkedin" value="{{\App\Models\Setting::get("media_linkedin")}}"
                               class="form-control" id="projectName">
                    </div>

                    <div class="mt-4">
                        <label for="projectName" class="form-label">Youtube</label>
                        <input type="text" name="media_youtube" value="{{\App\Models\Setting::get("media_youtube")}}"
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
