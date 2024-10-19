@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kurum Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kurum İmkanları</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Kurum İmkanları Düzenle</h6>
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bolder">İmkan Ekle & Düzenle</h5>
                    <p class="form-text text-muted text-xs ms-1 d-inline">
                        (Kurumların kullanabilmesi için imkan ekleyiniz)
                    </p>
                    <form class="form-submit" action="{{route("panel.companies.feature.store")}}" method="POST">
                        @csrf
                        <div class="multisteps-form__content">
                            <div class="row mt-4">
                                <div class="col-sm-12">
                                    <label class="form-label">İsim</label>
                                    <div class="input-group">
                                        <input id="name" name="name" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-12 align-self-center">
                                    <label class="form-label mt-4">Üst Menü</label>
                                    <select class="form-control" name="group_id">
                                        <option value="0">Yok</option>
                                        @foreach($mainMenus as $mainMenu)
                                            <option value="{{$mainMenu->id}}">{{$mainMenu->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12 align-self-center">
                                    <label class="form-label mt-4">Durum</label>
                                    <select class="form-control" name="status">
                                        <option value="1">Aktif</option>
                                        <option value="0">Pasif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="button-row d-flex mt-4">
                                <button class="btn bg-gradient-primary ms-auto mb-0 js-btn-next" type="submit">
                                    Kaydet
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="font-weight-bolder">İmkan Sil</h5>
                    <p class="form-text text-muted text-xs ms-1 d-inline">
                        (Silmek istediğiniz imkanları seçiniz)
                    </p>
                    <form class="form-submit" action="{{route("panel.companies.feature.delete")}}" method="POST">
                        @csrf
                        <div class="multisteps-form__content">
                            <div class="row">
                                <div class="col-sm-12 align-self-center">
                                    <label class="form-label mt-4">İsim</label>
                                    <select class="form-control" name="id" id="featureSelect">
                                        @foreach($features as $feature)
                                            <option value="{{ $feature->id }}">{{ $feature->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="button-row d-flex mt-4">
                                <button type="submit" id="deleteButton" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"
                                        class="btn bg-gradient-danger ms-auto mb-0 js-btn-next">Sil
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mt-lg-0 mt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bolder">İmkan Listesi</h5>
                    <p class="form-text text-muted text-xs ms-1 d-inline">
                        (Düzenlemek istediğiniz kategorinin üstüne tıklayınız)
                    </p>
                    <ul class="menu-container mt-4">
                        @foreach($menuStructure as $mainMenu)
                            <li class="menu-item">
                                <a href="#" class="menu-item-link" data-id="{{ $mainMenu->id }}"
                                   data-name="{{ $mainMenu->name }}"
                                   data-group="0"
                                   data-status="{{ $mainMenu->status }}">
                                    <span
                                        class="badge {{$mainMenu->status ? "bg-gradient-primary" : "bg-gradient-secondary"}} mt-1">{{ $mainMenu->name }}</span>
                                </a>
                                @if($mainMenu->subMenus->isNotEmpty())
                                    <ul class="submenu">
                                        @foreach($mainMenu->subMenus as $subMenu)
                                            <li>
                                                <a href="#" class="menu-item-link" data-id="{{ $subMenu->id }}"
                                                   data-name="{{ $subMenu->name }}"
                                                   data-group="{{ $subMenu->group_id }}"
                                                   data-status="{{ $subMenu->status }}">
                                                    <span
                                                        class="badge {{$subMenu->status ? "bg-gradient-success" : "bg-gradient-secondary"}}  mt-1">
                                                        {{ $subMenu->name }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <style>
        .menu-container, .submenu {
            list-style-type: none;
            margin-top: 5px;
            margin-bottom: 5px;
        }
    </style>
@endpush
@push('scripts')
    <script>
        document.querySelectorAll('.menu-item-link').forEach(item => {
            item.addEventListener('click', function (event) {
                event.preventDefault();

                var id = this.getAttribute('data-id');
                var name = this.getAttribute('data-name');
                var status = this.getAttribute('data-status');
                var group = this.getAttribute('data-group');

                document.getElementById('name').value = name;
                document.querySelector('select[name="status"]').value = status;
                document.querySelector('select[name="group_id"]').value = group;

                var hiddenIdField = document.getElementById('menu-id');
                if (!hiddenIdField) {
                    hiddenIdField = document.createElement('input');
                    hiddenIdField.type = 'hidden';
                    hiddenIdField.id = 'menu-id';
                    hiddenIdField.name = 'menu_id';
                    document.querySelector('form').appendChild(hiddenIdField);
                }
                hiddenIdField.value = id;
            });
        });
    </script>
@endpush

