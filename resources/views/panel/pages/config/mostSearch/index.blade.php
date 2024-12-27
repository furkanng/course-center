@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Site Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">En Çok Arananlar</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">En Çok Arananlar Listesi</h6>
@endsection

@section('content')

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">En Çok Aranan Kurumlar</h5>
                            <p class="text-sm mb-0">
                                Ana sayfadaki en çok aranan kurumlar listesini düzenleyebilirsiniz.
                            </p>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="{{route("panel.config.most-search.create")}}"
                                   class="btn bg-gradient-primary btn-sm mb-0">+&nbsp;Kurum Ekle</a>
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
                                    Kurum
                                </th>
                                <th>
                                    Ekleyen
                                </th>
                                <th>
                                    Ödeme Durumu
                                </th>
                                <th>
                                    Durum
                                </th>
                                <th>
                                    Kalan Zaman
                                </th>
                                <th>
                                    İşlemler
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td class="text-sm">
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-xs">{{$company->company->name}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-sm">
                                        @if($company->added_by == "admin")
                                            <span class="badge badge-dot me-4">
                                                <i class="bg-info"></i>
                                                <span class="text-dark text-xs">Admin</span>
                                            </span>
                                        @else
                                            <span class="badge badge-dot me-4">
                                                <i class="bg-danger"></i>
                                                <span class="text-dark text-xs">Sistem</span>
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-sm">
                                        @if(!empty($company->order_id))
                                            <span class="badge badge-dot me-4">
                                                <i class="bg-success"></i>
                                                <span class="text-dark text-xs">Ödendi</span>
                                            </span>
                                        @else
                                            <span class="badge badge-dot me-4">
                                                <i class="bg-danger"></i>
                                                <span class="text-dark text-xs">Ödeme Yok</span>
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-sm">
                                        @if($company->status)
                                            <span class="badge badge-dot me-4">
                                                <i class="bg-success"></i>
                                                <span class="text-dark text-xs">Yayında</span>
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
                                                <h6 class="mb-0 text-xs">{{\App\Service\Helper::getRemainingTimeAttribute($company->remaining_date)}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-sm">
                                        <a href="{{route("panel.config.most-search.edit",["id" => $company->id])}}"
                                           class="mx-3">
                                            <i class="fas fa-edit text-secondary text-sm"></i>
                                        </a>
                                        <a href="#" data-bs-toggle="modal"
                                           data-bs-target="#deleteModal-{{ $company->id }}">
                                            <i class="fas fa-trash-alt text-secondary text-sm"></i>
                                        </a>
                                    </td>
                                </tr>
                                <x-delete-modal modalId="deleteModal-{{ $company->id }}"
                                                title="Silme Onayı"
                                                body="Bu öğeyi silmek istediğinizden emin misiniz?"
                                                action="{{ route('panel.config.most-search.destroy', ['id' => $company->id]) }}">
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

