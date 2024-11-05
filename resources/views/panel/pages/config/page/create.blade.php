@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Site Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="{{route("panel.config.pages.index")}}">Sayfa Listesi</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Sayfa Ekle</li>
@endsection

@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Sayfa Ekle</h6>
@endsection

@section('content')

    <div class="row mt-3">
        <div class="col-12 col-md-12 col-xl-12">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Sayfa Detayları</h6>
                </div>
                <div class="card-body p-3">
                    <form class="form-submit" method="POST"
                          action="{{route("panel.config.pages.store")}}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="title">Başlık</label>
                                    <input type="text" class="form-control"
                                           name="title" id="title" placeholder="Sayfa Başlık">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="course">Durum</label>
                                    <select class="form-control" name="status" required>
                                        <option value="1">Aktif</option>
                                        <option value="0">Pasif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="course">Adres</label>
                                    <div id="edit-deschiption-edit" class="h-100">

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

@push('scripts')
    <script>
        if (document.getElementById('edit-deschiption-edit')) {
            var quill = new Quill('#edit-deschiption-edit', {
                theme: 'snow',
                height: '200'
            });
        }
    </script>
@endpush

