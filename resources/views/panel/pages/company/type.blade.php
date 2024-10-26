@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kurum Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kurumlar</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kurum Tipleri Listesi</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Kurum Tipleri</h6>
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bolder">Kurum Tipi Ekle & Düzenle</h5>
                    <p class="form-text text-muted text-xs ms-1 d-inline">
                        (Kurumların kullanabilmesi için tip ekleyiniz)
                    </p>
                    <form class="form-submit" id="typeForm" action="{{ route("panel.companies.type.store") }}"
                          method="POST">
                        @csrf
                        <div class="multisteps-form__content">
                            <div class="row mt-4">
                                <div class="col-sm-12">
                                    <label class="form-label">Tip Adı</label>
                                    <div class="input-group">
                                        <input id="name" name="name" class="form-control" type="text" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <label class="form-label">Tip Kodu</label>
                                    <div class="input-group">
                                        <input id="code" name="code" class="form-control" type="text" required>
                                    </div>
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
                    <h5 class="font-weight-bolder">Tip Sil</h5>
                    <p class="form-text text-muted text-xs ms-1 d-inline">
                        (Silmek istediğiniz tipi seçiniz)
                    </p>
                    <form class="form-submit" action="{{route("panel.companies.type.delete")}}" method="POST">
                        @csrf
                        <div class="multisteps-form__content">
                            <div class="row">
                                <div class="col-sm-12 align-self-center">
                                    <label class="form-label mt-4">Tip Adı</label>
                                    <select class="form-control" name="code" id="featureSelect">
                                        @foreach($types as $type)
                                            <option value="{{ $type->code }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="button-row d-flex mt-4">
                                <button type="submit" id="deleteButton"
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
                    <h5 class="font-weight-bolder">Tip Listesi</h5>
                    <p class="form-text text-muted text-xs ms-1 d-inline">
                        (Düzenlemek istediğiniz tipin üstüne tıklayınız)
                    </p>
                    <ul class="menu-container mt-4">
                        @foreach($types as $type)
                            <li class="menu-item mt-2">
                                <a href="#" class="menu-item-link" data-code="{{ $type->code }}"
                                   data-name="{{ $type->name }}">
                                    <span class="badge bg-gradient-secondary mt-1">{{ $type->name }}</span>
                                </a>
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
        .menu-container {
            list-style-type: none;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.querySelectorAll('.menu-item-link').forEach(item => {
            item.addEventListener('click', function (event) {
                event.preventDefault();

                var name = this.getAttribute('data-name');
                var code = this.getAttribute('data-code');

                document.getElementById('name').value = name;
                document.getElementById('code').value = code;

                var hiddenCodeField = document.getElementById('menu-code');
                if (!hiddenCodeField) {
                    hiddenCodeField = document.createElement('input');
                    hiddenCodeField.type = 'hidden';
                    hiddenCodeField.id = 'menu-code';
                    hiddenCodeField.name = 'menu_code';
                    document.querySelector('form').appendChild(hiddenCodeField);
                }

                hiddenCodeField.value = code;
            });
        });
    </script>

@endpush
