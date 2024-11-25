@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Talepler</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Bülten</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Bülten Listesi</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Bülten Listesi</h6>
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Bülten Listesi</h5>
                            <p class="text-sm mb-0">
                                Bülten kaydı olan tüm kullanıcıları görebilirsiniz.
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
                                    E-Posta
                                </th>
                                <th class="w-15">
                                    İşlemler
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="text-sm">
                                        {{$user->email}}
                                    </td>
                                    <td class="text-sm">
                                        <a href="#" data-bs-toggle="modal"
                                           data-bs-target="#deleteModal-{{ $user->id }}">
                                            <i class="fas fa-trash-alt text-secondary text-sm"></i>
                                        </a>
                                    </td>
                                </tr>
                                <x-delete-modal modalId="deleteModal-{{ $user->id }}"
                                                title="Silme Onayı"
                                                body="Bu öğeyi silmek istediğinizden emin misiniz?"
                                                action="{{ route('panel.contacts.bulletin.destroy', ['id' => $user->id]) }}">
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
