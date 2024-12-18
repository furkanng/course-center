@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Talepler</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kullanıcı Talepleri</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Talep Kullanıcı Listesi</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Talep Kullanıcı Listesi</h6>
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Kullanıcılar Listesi</h5>
                            <p class="text-sm mb-0">
                                İletişim talebinde bulunan tüm kullanıcıları görebilirsiniz. Kayıt yapıldıysa butona tıklayınız kayıt yapıldı olarak işaretleyiniz.
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
                                    İsim
                                </th>
                                <th>
                                    E-Posta
                                </th>
                                <th>
                                    Telefon
                                </th>
                                <th>
                                    İlgilendiği Kurum
                                </th>
                                <th>
                                    Kayıt Yaptırdı
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
                                        {{$user->customer_name}}
                                    </td>
                                    <td class="text-sm">
                                        {{$user->customer_email}}
                                    </td>
                                    <td class="text-sm">
                                        {{$user->customer_phone}}
                                    </td>
                                    <td class="text-sm">
                                        <a href="{{route("merchant.companies.company.edit",["id" =>$user->company->id])}}"
                                           target="_blank">
                                            {{$user->company->name}}
                                        </a>
                                    </td>
                                    <td class="text-sm">
                                        <form class="form-submit" action="{{route("merchant.contacts.users.update",["id"=> $user->id])}}"
                                              method="POST">
                                            @csrf
                                            @method("PUT")
                                            <input name="review" value="{{$user->review}}" hidden="">
                                            <button type="submit" class="btn {{$user->review ? 'btn-info' : 'btn-danger'}} btn-sm">
                                                {{$user->review ? 'Evet' : 'Hayır'}}
                                            </button>
                                        </form>
                                    </td>

                                    <td class="text-sm">
                                        <a href="{{route("merchant.contacts.users.show",["id" => $user->id])}}"
                                           class="mx-2" data-bs-toggle="tooltip"
                                           data-bs-original-title="Detaylar">
                                            <i class="fas fa-edit text-secondary"></i>
                                        </a>
                                        {{--
                                        <a href="#" data-bs-toggle="modal"
                                           data-bs-target="#deleteModal-{{ $user->id }}">
                                            <i class="fas fa-trash-alt text-secondary text-sm"></i>
                                        </a>
                                        --}}
                                    </td>
                                </tr>
                                {{--
                                <x-delete-modal modalId="deleteModal-{{ $user->id }}"
                                                title="Silme Onayı"
                                                body="Bu öğeyi silmek istediğinizden emin misiniz?"
                                                action="{{ route('panel.contacts.users.destroy', ['id' => $user->id]) }}">
                                </x-delete-modal>
                                --}}

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $users->links('panel.pagination.custom-pagination') }}
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
