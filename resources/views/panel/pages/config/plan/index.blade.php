@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Site Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Ödeme Planları</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Ödeme Planları Listesi</h6>
@endsection

@section('content')

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Ödeme Planları</h5>
                            <p class="text-sm mb-0">
                                Firmaların satın alması için plan oluşturabilirsiniz
                            </p>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="{{route("panel.config.plans.create")}}"
                                   class="btn bg-gradient-primary btn-sm mb-0">+&nbsp;Plan Ekle</a>
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
                                    Fiyat
                                </th>
                                <th>
                                    Tip
                                </th>
                                <th>
                                    Periyot
                                </th>
                                <th>
                                    Durum
                                </th>
                                <th>
                                    İşlemler
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($plans as $plan)
                                <tr>
                                    <td class="text-sm">
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-xs">{{$plan->name}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-sm">
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-xs">{{$plan->price}} ₺</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-sm">
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-xs">{{$plan->type->label()}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-sm">
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-xs">{{$plan->period->label()}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-sm">
                                        @if($plan->status)
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
                                        <a href="{{route("panel.config.plans.edit",["id" => $plan->id])}}"
                                           class="mx-3">
                                            <i class="fas fa-edit text-secondary text-sm"></i>
                                        </a>
                                        <a href="#" data-bs-toggle="modal"
                                           data-bs-target="#deleteModal-{{ $plan->id }}">
                                            <i class="fas fa-trash-alt text-secondary text-sm"></i>
                                        </a>
                                    </td>
                                </tr>
                                <x-delete-modal modalId="deleteModal-{{ $plan->id }}"
                                                title="Silme Onayı"
                                                body="Bu öğeyi silmek istediğinizden emin misiniz?"
                                                action="{{ route('panel.config.plans.destroy', ['id' => $plan->id]) }}">
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

