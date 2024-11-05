@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Site Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Sayfa Yönetimi</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Sayfa Listesi</h6>
@endsection

@section('content')

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Tüm Sayfalar</h5>
                            <p class="text-sm mb-0">
                                Site içerisindeki tüm sayfaları düzenleyebilirsiniz.
                            </p>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="{{route("panel.config.pages.create")}}"
                                   class="btn bg-gradient-primary btn-sm mb-0">+&nbsp;Yeni Sayfa</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatable-search">
                            <thead class="thead-light">
                            <tr>
                                <th>
                                    Başlık
                                </th>
                                <th>
                                    Sabit
                                </th>
                                <th>
                                    Durum
                                </th>
                                <th>
                                    Güncelleme Tarihi
                                </th>
                                <th>
                                    İşlemler
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <td class="text-sm">
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-xs">{{$page->title}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-sm">
                                        @if($page->permanent)
                                            <span class="badge badge-dot me-4">
                                                <i class="bg-info"></i>
                                                <span class="text-dark text-xs">Evet</span>
                                            </span>
                                        @else
                                            <span class="badge badge-dot me-4">
                                                <i class="bg-danger"></i>
                                                <span class="text-dark text-xs">Hayır</span>
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-sm">
                                        @if($page->status)
                                            <span class="badge badge-dot me-4">
                                                <i class="bg-success"></i>
                                                <span class="text-dark text-xs">Aktif</span>
                                            </span>
                                        @else
                                            <span class="badge badge-dot me-4">
                                                <i class="bg-danger"></i>
                                                <span class="text-dark text-xs">Pasif</span>
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-sm">
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-xs">{{$page->created_at}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-sm">
                                        <a href="{{route("panel.config.pages.edit",["id" => $page->id])}}"
                                           class="mx-3">
                                            <i class="fas fa-edit text-secondary text-sm"></i>
                                        </a>
                                        <a href="#" data-bs-toggle="modal"
                                           data-bs-target="#deleteModal-{{ $page->id }}">
                                            <i class="fas fa-trash-alt text-secondary text-sm"></i>
                                        </a>
                                    </td>
                                </tr>
                                <x-delete-modal modalId="deleteModal-{{ $page->id }}"
                                                title="Silme Onayı"
                                                body="Bu öğeyi silmek istediğinizden emin misiniz?"
                                                action="{{ route('panel.config.pages.destroy', ['id' => $page->id]) }}">
                                </x-delete-modal>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
            searchable: true,
            fixedHeight: false
        });
    </script>
@endpush

