@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Site Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Site Metinleri</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Site Metinleri</h6>
@endsection

@section('content')

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h5 class="mb-0">Önyüz Metin Yazıları</h5>
                    <p class="text-sm mb-0">
                        Önyüz tarafındaki metin yazılarını burda düzenleyebilirsiniz.
                    </p>
                </div>
                <div class="table-responsive">
                    <table class="table table-flush" id="datatable-search">
                        <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Anahtar</th>
                            <th>Değer</th>
                            <th>Dil</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($languages as $language)
                            <tr>
                                <td class="text-sm font-weight-normal">{{$language->id}}</td>
                                <td class="text-sm font-weight-normal">{{$language->key}}</td>
                                <td class="text-sm font-weight-normal">
                                    <form id="input-form-{{ $language->id }}" method="POST"
                                          action="{{ route('panel.config.language.update', ['id' => $language->id]) }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" placeholder="Değer" name="value"
                                               value="{{$language->value}}"
                                               class="form-control form-update update-input"
                                               data-language-id="{{ $language->id }}"/>
                                    </form>
                                </td>
                                <td class="text-sm font-weight-normal">{{$language->language}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <script>
        const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
            searchable: true,
            fixedHeight: true
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputFields = document.querySelectorAll('.update-input');

            inputFields.forEach(input => {
                input.addEventListener('change', function () {
                    const languageId = this.getAttribute('data-language-id');
                    const form = document.getElementById(`input-form-${languageId}`);
                    form.submit();
                });
            });
        });
    </script>
@endpush

