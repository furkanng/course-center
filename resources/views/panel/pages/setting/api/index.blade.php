@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Ayarlar</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Api Ayarları</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Api Ayarları</h6>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-9 col-12 mx-auto">
            <div class="card card-body mt-4">
                <h6 class="mb-0">Api Yapılandırılması</h6>
                <p class="text-sm mb-0">Proje içerisindeki api bilgilerinizi giriniz.</p>
                <hr class="horizontal dark my-3">

                <form class="form-submit" action="{{ route('panel.setting.api.store') }}" method="POST">
                    @csrf

                    <div class="form-group mt-4">
                        <label for="whatsapp_api" class="form-label">Whatsapp Kodu:</label>
                        <div class="input-group">
                                <span class="input-group-text bg-dark text-white">
                                    <i class="fas fa-code"></i>
                                </span>
                            <textarea type="text" name="whatsapp_api" id="whatsapp_api"
                                      class="form-control text-monospace border-dark bg-light p-2"
                            >{{ \App\Models\Setting::get('whatsapp_api') }}
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <label for="phone_api" class="form-label">Telefon Kodu:</label>

                        <div class="input-group">
                                <span class="input-group-text bg-dark text-white">
                                    <i class="fas fa-code"></i>
                                </span>
                            <textarea name="phone_api" id="phone_api"
                                      class="form-control text-monospace border-dark bg-light p-2"
                            >{{ \App\Models\Setting::get('phone_api') }}</textarea>

                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <label for="analytics_api" class="form-label">Google Analytics
                            Kodu:</label>
                        <div class="input-group">
                                    <span class="input-group-text bg-dark text-white">
                                        <i class="fas fa-chart-line"></i>
                                    </span>
                            <textarea type="text" name="analytics_api" id="analytics_api"
                                      class="form-control text-monospace border-dark bg-light p-2"
                            >{{ \App\Models\Setting::get('analytics_api') }}
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <label for="webmaster_api" class="form-label">Webmaster Kodu:</label>
                        <div class="input-group">
                                <span class="input-group-text bg-dark text-white">
                                    <i class="fas fa-tools"></i>
                                </span>
                            <textarea type="text" name="webmaster_api" id="webmaster_api"
                                      class="form-control text-monospace border-dark bg-light p-2"
                            >{{ \App\Models\Setting::get('webmaster_api') }}
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <label for="map_api" class="form-label">Google Map Kodu:</label>
                        <div class="input-group">
                                <span class="input-group-text bg-dark text-white">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                            <textarea type="text" name="map_api" id="map_api"
                                      class="form-control text-monospace border-dark bg-light p-2"
                            >{{ \App\Models\Setting::get('map_api') }}
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <label for="live_support_api" class="form-label">Canlı Destek
                            Kodu:</label>
                        <div class="input-group">
                                <span class="input-group-text bg-dark text-white">
                                    <i class="fas fa-comments"></i>
                                </span>
                            <textarea type="text" name="live_support_api" id="live_support_api"
                                      class="form-control text-monospace border-dark bg-light p-2"
                            >{{ \App\Models\Setting::get('live_support_api') }}
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <label for="recaptcha_api" class="form-label">Google Recaptcha
                            Kodu:</label>
                        <div class="input-group">
                                <span class="input-group-text bg-dark text-white">
                                    <i class="fas fa-robot"></i>
                                </span>
                            <textarea type="text" name="recaptcha_api" id="recaptcha_api"
                                      class="form-control text-monospace border-dark bg-light p-2"
                            >{{ \App\Models\Setting::get('recaptcha_api') }}</textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" name="button" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
