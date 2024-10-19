@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Sistem Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kullanıcılar</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kurumsal Başvuru Listesi</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Kurumsal Başvuru Listesi</h6>
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Tüm Kurumsal Başvurular</h5>
                            <p class="text-sm mb-0">
                                Burda kurumsal kayıt olup onay bekleyen kullanıcılar listelenmektedir.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatable-user-list">
                            <thead class="thead-light">
                            <tr>
                                <th>
                                    İsim Soyisim
                                </th>
                                <th>
                                    Telefon
                                </th>
                                <th>
                                    Firma İsmi
                                </th>
                                <th>
                                    Firma Tipi
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
                                        {{$user->user->name}}
                                    </td>
                                    <td class="text-sm">
                                        {{$user->user->phone}}
                                    </td>
                                    <td class="text-sm">
                                        {{$user->company_name}}
                                    </td>
                                    <td class="text-sm">
                                        {{$user->user->getCompanyTypeName()}}
                                    </td>

                                    <td class="text-xs font-weight-bold">
                                        <div class="d-flex align-items-center">
                                            @switch($user->status)
                                                @case(\App\Enums\UserStatus::PENDING)
                                                    <button class="btn btn-icon-only btn-rounded btn-outline-dark
                                                     mb-0 me-2 btn-sm d-flex align-items-center justify-content-center">
                                                        <i class="fa-solid fa-hourglass-half" aria-hidden="true"></i>
                                                    </button>
                                                    <span>{{\App\Enums\UserStatus::PENDING->label()}}</span>
                                                    @break
                                                @case(\App\Enums\UserStatus::ACCEPTED)
                                                    <button class="btn btn-icon-only btn-rounded btn-outline-success
                                                     mb-0 me-2 btn-sm d-flex align-items-center justify-content-center">
                                                        <i class="fas fa-check" aria-hidden="true"></i></button>
                                                    <span>{{\App\Enums\UserStatus::ACCEPTED->label()}}</span>
                                                    @break
                                                @case(\App\Enums\UserStatus::REJECTED)
                                                    <button
                                                        class="btn btn-icon-only btn-rounded btn-outline-danger
                                                        mb-0 me-2 btn-sm d-flex align-items-center justify-content-center">
                                                        <i class="fas fa-times" aria-hidden="true"></i></button>
                                                    <span>{{\App\Enums\UserStatus::REJECTED->label()}}</span>
                                                    @break
                                            @endswitch
                                        </div>
                                    </td>

                                    <td class="text-sm">
                                        <a href="{{route("panel.system.institutions.edit",["id" => $user->user_id])}}"
                                           data-bs-toggle="tooltip">
                                            <i class="fas fa-eye text-secondary"></i>
                                        </a>
                                        <a href="{{route("panel.system.institutional-register.edit",["id" => $user->id])}}"
                                           class="mx-3" data-bs-toggle="tooltip">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <a href="#" data-bs-toggle="modal"
                                           data-bs-target="#deleteModal-{{ $user->id }}">
                                            <i class="fas fa-trash text-secondary"></i>
                                        </a>
                                    </td>
                                </tr>
                                <x-delete-modal modalId="deleteModal-{{ $user->id }}"
                                                title="Silme Onayı"
                                                body="Bu öğeyi silmek istediğinizden emin misiniz?"
                                                action="{{ route('panel.system.institutional-register.destroy', ['id' => $user->id]) }}">
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
