@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Site Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Siparişler</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Siparişler Listesi</h6>
@endsection

@section('content')

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Siparişler</h5>
                            <p class="text-sm mb-0">
                                Tüm siparişleri burdan görebilirsiniz
                            </p>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="{{route("panel.config.orders.create")}}"
                                   class="btn bg-gradient-primary btn-sm mb-0">+&nbsp;Sipariş Oluştur</a>
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
                                    Reklam Adı
                                </th>
                                <th>
                                    Reklam Tipi
                                </th>
                                <th>
                                    Fiyat
                                </th>
                                <th>
                                    Ödenme Durumu
                                </th>
                                <th>
                                    Onay Durumu
                                </th>
                                <th>
                                    İşlemler
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td class="text-sm">
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-xs">{{$order->plan->name ?? "Misafir Kayıt"}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-sm">
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-xs">{{$order->plan_type->label()}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-sm">
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-xs">{{$order->price}} ₺</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-sm">
                                        <span class="badge badge-dot me-4">
                                            <i class="{{ $order->payment_status == \App\Enums\PaymentStatus::PAID ? 'bg-success' : 'bg-danger' }}"></i>
                                            <span class="text-dark text-xs">
                                                {{ $order->payment_status->label() }}
                                            </span>
                                        </span>
                                    </td>
                                    <td class="text-sm">
                                        <span class="badge badge-dot me-4">
                                            <i class="{{ $order->status == \App\Enums\OrderStatus::PENDING ? 'bg-danger' : 'bg-success' }}"></i>
                                            <span class="text-dark text-xs">
                                                {{ $order->status->label() }}
                                            </span>
                                        </span>
                                    </td>

                                    <td class="text-sm">
                                        <a href="{{route("panel.config.orders.edit",["id" => $order->id])}}"
                                           class="mx-3">
                                            <i class="fas fa-edit text-secondary text-sm"></i>
                                        </a>
                                        <a href="#" data-bs-toggle="modal"
                                           data-bs-target="#deleteModal-{{ $order->id }}">
                                            <i class="fas fa-trash-alt text-secondary text-sm"></i>
                                        </a>
                                    </td>
                                </tr>
                                <x-delete-modal modalId="deleteModal-{{ $order->id }}"
                                                title="Silme Onayı"
                                                body="Bu öğeyi silmek istediğinizden emin misiniz?"
                                                action="{{ route('panel.config.orders.destroy', ['id' => $order->id]) }}">
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

