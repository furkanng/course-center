@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kurum Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kurumlar</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kurum Kullanıcıları Bilgisi</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Kurum Kullanıcıları</h6>
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bolder">Kullanıcı Ata & Değiştir</h5>
                    <p class="form-text text-muted text-xs ms-1 d-inline">
                        (Kuruma ait olacak kullanıcıyı belirleyiniz)
                    </p>
                    <div class="px-0 pb-0">
                        <div class="table-responsive">
                            <table class="table table-flush" id="datatable-user-list">
                                <thead class="thead-light">
                                <tr>
                                    <th>İsim</th>
                                    <th>E-Posta</th>
                                    <th>Telefon</th>
                                    <th>Kurum Sayısı</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($institutions as $institution)
                                    <tr>
                                        <td class="text-sm">
                                            {{$institution->name}}
                                        </td>
                                        <td class="text-sm">
                                            {{$institution->email}}
                                        </td>
                                        <td class="text-sm">
                                            {{$institution->phone}}
                                        </td>
                                        <td class="text-sm">
                                            <span class="badge badge-dot me-4">
                                                    <i class="bg-info"></i>
                                                    <span class="text-dark text-xs">
                                                        {{count($institution->companies)}}
                                                    </span>
                                            </span>
                                        </td>
                                        <td class="text-sm">
                                            <a href="" data-bs-toggle="modal"
                                               data-bs-target="#confirmModal-{{ $institution->id }}">
                                                <button class="btn btn-sm bg-gradient-dark ms-auto mb-0" type="button">
                                                    Ata
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    <x-confirm-modal modalId="confirmModal-{{ $institution->id }}"
                                                     title="Atama Onayı"
                                                     body="Dikkat! Eğer başka bir kullanıcı varsa onun yerine atanacaktır."
                                                     method="PUT"
                                                     button="Onayla"
                                                     action="{{route('panel.companies.user.update', ['company' => $company->id,'user' => $institution->id])}}"
                                    >
                                    </x-confirm-modal>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mt-lg-0 mt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bolder">Kullanıcı Bilgisi</h5>
                    @if($user)
                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <label class="form-label">Kullanıcı Adı</label>
                                <div class="input-group">
                                    <input id="name" class="form-control" value="{{$user->name}}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-12 mt-4 d-flex justify-content-between">
                                <a href="{{route("panel.system.institutions.edit",["id" => $user->id])}}"
                                   target="_blank">
                                    <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button">
                                        Detaylar
                                    </button>
                                </a>
                                <a href="#" data-bs-toggle="modal"
                                   data-bs-target="#deleteModal-{{ $user->id }}">
                                    <button class="btn bg-gradient-danger ms-auto mb-0 js-btn-next" type="button">
                                        Kaldır
                                    </button>
                                </a>
                                <x-delete-modal modalId="deleteModal-{{ $user->id }}"
                                                title="Kaldırma Onayı"
                                                body="Bu atamayı kaldırmak istediğinizden emin misiniz?"
                                                action="{{ route('panel.companies.user.destroy', ['company' => $company->id,'user' => $user->id]) }}">
                                </x-delete-modal>
                            </div>
                        </div>
                    @else
                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <label class="form-label">Atanmış Kullanıcı Bulunmuyor</label>
                            </div>
                        </div>
                    @endif

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
