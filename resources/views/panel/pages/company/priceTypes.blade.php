@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kurum Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kurumlar</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kurum Fiyat Tipleri</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Kurum Fiyat Tipleri</h6>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex align-items-center justify-content-between">
                        <div class="me-3">
                            <h5 class="mb-0">Kurum Fiyat Tipleri</h5>
                            <p class="text-sm mb-0">
                                Belirlenmiş fiyat tiplerini görebilirsiniz.
                            </p>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="{{route("panel.companies.price_types.create")}}"
                                   class="btn bg-gradient-primary btn-sm mb-0">+&nbsp;Yeni Fiyat Tipi</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="products-list">
                            <thead class="thead-light">
                            <tr>
                                <th>Fiyat Başlığı</th>
                                <th>Tarih</th>
                                <th>Durum</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($priceTypes as $type)
                                <tr>
                                    <td class="text-bolder text-sm">{{$type->price_title}}</td>
                                    <td class="text-sm">{{$type->created_at}}</td>

                                    <td class="text-sm">
                                        <span
                                            class="badge {{$type->status ? "badge-success": "badge-dark"}} badge-md">
                                            {{$type->status ? "Aktif": "Pasif"}}
                                        </span>
                                    </td>
                                    <td class="text-sm">
                                        <button
                                            type="button" data-bs-toggle="modal"
                                            data-bs-target="#priceTypeEditModal{{$type->id}}"
                                            class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
                                            <i class="fas fa-edit text-secondary text-sm"></i>
                                        </button>
                                        <a href="#" data-bs-toggle="modal"
                                           data-bs-target="#deleteModal-{{ $type->id }}">
                                            <i class="fas fa-trash-alt text-secondary text-sm"></i>
                                        </a>
                                        <x-price-type-edit-modal
                                            modalId="priceTypeEditModal{{$type->id}}"
                                            action="{{ route('panel.companies.price_types.update',['id' => $type->id]) }}"
                                            method="PUT"
                                            priceTitle="{{$type->price_title}}"
                                            status="{{$type->status}}">
                                        </x-price-type-edit-modal>
                                    </td>
                                    <x-delete-modal modalId="deleteModal-{{ $type->id }}"
                                                    title="Silme Onayı"
                                                    body="Bu öğeyi silmek istediğinizden emin misiniz?"
                                                    action="{{ route('panel.companies.price_types.destroy',
                                                ['id' => $type->id]) }}">
                                    </x-delete-modal>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $priceTypes->links('panel.pagination.custom-pagination') }}

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetchProvinces();
            formatPhoneNumber();
        });
    </script>

@endpush
