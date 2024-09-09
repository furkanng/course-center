@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kullanıcı Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="{{route("panel.system.course.index")}}">Kullanıcı Listesi</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kullanıcı Düzenle</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Kullanıcı Düzenle</h6>
@endsection

@section('content')

    <div class="row mt-3">
        <div class="col-12 col-md-8 col-xl-6">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Kullanıcı Detayları</h6>
                </div>
                <div class="card-body p-3">
                    <form class="form-submit" method="POST"
                          action="{{route("panel.system.users.update",["id" =>$user->id])}}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-number-input" class="form-control-label">İsim</label>
                                    <input class="form-control" type="text" name="name" style="width: 100%"
                                           value="{{$user->name}}"
                                           id="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-number-input" class="form-control-label">Email</label>
                                    <input class="form-control" type="text" name="email" style="width: 100%"
                                           value="{{$user->email}}"
                                           id="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-number-input" class="form-control-label">Telefon</label>
                                    <input class="form-control" type="text" name="phone" style="width: 100%"
                                           value="{{$user->phone}}"
                                           id="phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-number-input" class="form-control-label">Şehir</label>
                                    <div class="sign__input">
                                        <select class="form-control" name="city" data-selected-city="{{ $user->city }}"
                                                id="citySelect" required
                                                onchange="updateDistricts()">
                                            <option value="">Seciniz</option>
                                        </select>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-number-input" class="form-control-label">İlçe</label>
                                    <div class="sign__input">
                                        <select class="form-control" name="district"
                                                data-selected-district="{{ $user->district}}" required
                                                id="districtSelect">
                                            <option value="">Önce ili seçiniz</option>
                                        </select>

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-number-input" class="form-control-label">Kullanıcı Tipi</label>
                                    <div class="sign__input">
                                        <select class="form-control" name="user_type" required id="user_type">
                                            @foreach(\App\Enums\UserType::cases() as $key)
                                                <option value="{{ $key->value }}"
                                                        @if($key->value === $user->user_type) selected @endif>
                                                    {{ $key->label() }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="status" type="checkbox"
                                               id="flexSwitchCheckDefault"
                                            {{$user->status ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Durum</label>
                                    </div>
                                </div>
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
                                    action="{{ route('panel.system.institutions.institutionDelete', ['id' => $user->id]) }}">
                    </x-delete-modal>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetchProvinces();

            formatPhoneNumber();

            $('select').niceSelect();


        });
    </script>

@endpush

