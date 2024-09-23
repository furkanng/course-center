@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kurumsal Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="{{route("panel.system.institutional-register.index")}}">Kurumsal Başvuru
            Listesi</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Başvuru Düzenle</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Başvuru Düzenle</h6>
@endsection

@section('content')

    <div class="row mt-3">
        <div class="col-12 col-md-8 col-xl-6">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Başvuru Detayları</h6>
                </div>
                <div class="card-body p-3">
                    <form class="form-submit" method="POST"
                          action="{{route("panel.system.institutional-register.update",["id" =>$user->id])}}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-number-input" class="form-control-label">İsim Soyisim</label>
                                    <input class="form-control" disabled type="text" style="width: 100%"
                                           value="{{$user->user->name}}"
                                           id="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-number-input" class="form-control-label">Email</label>
                                    <input class="form-control" disabled type="text" style="width: 100%"
                                           value="{{$user->user->email}}"
                                           id="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-number-input" class="form-control-label">Firma Adı</label>
                                    <input class="form-control" disabled type="text" style="width: 100%"
                                           value="{{$user->company_name}}"
                                           id="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-number-input" class="form-control-label">Firma Tipi</label>
                                    <input class="form-control" disabled type="text" style="width: 100%"
                                           value="{{$user->user->getCompanyTypeName()}}"
                                           id="email">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" id="choices-currency-edit">Durum</label>
                                <select class="form-control" name="status" style="width: 95%">
                                    @foreach(\App\Enums\UserStatus::cases() as $status)
                                        <option
                                            value="{{$status}}" {{$user->status === $status ? "selected" : '' }}>
                                            {{$status->label()}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn bg-gradient-primary my-2">Kaydet</button>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $user->id }}"
                                class="btn bg-gradient-danger my-2">Sil
                        </button>

                    </form>
                    <x-delete-modal modalId="deleteModal-{{ $user->id }}"
                                    title="Silme Onayı"
                                    body="Bu öğeyi silmek istediğinizden emin misiniz?"
                                    action="{{ route('panel.system.institutions.destroy', ['id' => $user->id]) }}">
                    </x-delete-modal>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var phoneInput = document.getElementById('phone');
            if (phoneInput && phoneInput.value) {
                formatPhoneNumber(phoneInput);
            }
            fetchProvinces();

            formatPhoneNumber();

            $('select').niceSelect();

        });
    </script>

@endpush

