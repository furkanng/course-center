@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Sistem Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kullanıcı Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kullanıcı Listesi</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Kullanıcı Listesi</h6>
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Tüm Kullanıcılar</h5>
                            <p class="text-sm mb-0">
                                Site içerisindeki tüm kullanıcıları düzenleyebilirsiniz.
                            </p>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="{{route("panel.system.course.create")}}"
                                   class="btn bg-gradient-primary btn-sm mb-0">+&nbsp;Yeni Kullanıcı</a>
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
                                    Kullanıcı Tipi
                                </th>
                                <th>
                                    Kullanıcı Rolü
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
                                        {{$user->user_type}}
                                    </td>
                                    <td class="text-sm">
                                        {{$user->role}}
                                    </td>
                                    <td class="text-sm">
                                        @if($user->status === 1)
                                            <span class="badge badge-dot me-4">
                                                <i class="bg-info"></i>
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
                                        <a href=""
                                           class="mx-3">
                                            <i class="fas fa-edit text-secondary text-sm"></i>
                                        </a>
                                        <a href="#" data-bs-toggle="modal"
                                           data-bs-target="#deleteModal-">
                                            <i class="fas fa-trash-alt text-secondary text-sm"></i>
                                        </a>
                                    </td>
                                </tr>
                                <x-delete-modal modalId="deleteModal-"
                                                title="Silme Onayı"
                                                body="Bu öğeyi silmek istediğinizden emin misiniz?"
                                                action="">
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
