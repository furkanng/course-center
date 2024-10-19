@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Sistem Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kullanıcılar</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kurumsal Listesi</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Kurumsal Listesi</h6>
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Tüm Kurumsal Kullanıcılar</h5>
                            <p class="text-sm mb-0">
                                Site içerisindeki tüm kurum yöneticilerini görebilirsiniz
                            </p>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="{{route("panel.system.institutions.create")}}"
                                   class="btn bg-gradient-primary btn-sm mb-0">+&nbsp;Yeni Kurumsal</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatable-user-list">
                            <thead class="thead-light">
                            <tr>
                                <th>
                                    İsim
                                </th>
                                <th>
                                    E-Posta
                                </th>
                                <th>
                                    Telefon
                                </th>
                                <th>
                                    Şehir
                                </th>
                                <th>
                                    Firma İsmi
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
                            @foreach($users as $user)
                                <tr>
                                    <td class="text-sm">
                                        {{$user->name}}
                                    </td>
                                    <td class="text-sm">
                                        {{$user->email}}
                                    </td>
                                    <td class="text-sm">
                                        {{$user->phone}}
                                    </td>
                                    <td class="text-sm">
                                        {{$user->city}}
                                    </td>
                                    <td class="text-sm">
                                        {{$user->company_name}}
                                    </td>

                                    <td class="text-sm">
                                        <span class="badge badge-dot me-4">
                                                <i class="{{$user->status ? "bg-info" : "bg-danger"}}"></i>
                                                <span
                                                    class="text-dark text-xs">{{$user->status ? "Aktif" : "Pasif"}}</span>
                                        </span>
                                    </td>

                                    <td class="text-sm">
                                        <a href="{{route("panel.system.institutions.edit",["id" => $user->id])}}"
                                           class="mx-3">
                                            <i class="fas fa-edit text-secondary text-sm"></i>
                                        </a>
                                        <a href="#" data-bs-toggle="modal"
                                           data-bs-target="#deleteModal-{{ $user->id }}">
                                            <i class="fas fa-trash-alt text-secondary text-sm"></i>
                                        </a>
                                    </td>
                                </tr>
                                <x-delete-modal modalId="deleteModal-{{ $user->id }}"
                                                title="Silme Onayı"
                                                body="Bu öğeyi silmek istediğinizden emin misiniz?"
                                                action="{{ route('panel.system.institutions.destroy', ['id' => $user->id]) }}">
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
        const dataTableSearch = new simpleDatatables.DataTable("#datatable-user-list", {
            searchable: true,
            fixedHeight: false
        });
    </script>
@endpush
