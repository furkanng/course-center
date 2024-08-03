@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kurs Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="{{route("panel.system.course.index")}}">Kurs Listesi</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kurs Düzenle</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Kurs Düzenle</h6>
@endsection

@section('content')

    <div class="row mt-3">
        <div class="col-12 col-md-8 col-xl-6">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Kurs Detayları</h6>
                </div>
                <div class="card-body p-3">
                    <form class="form-submit" method="POST"
                          action="{{route("panel.system.course.update",["id" =>$course->id])}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="course">Kurs</label>
                            <input type="text" class="form-control"
                                   {{ $errors->has('name') ? 'is-invalid' : '' }} value="{{$course->name}}"
                                   name="name" id="course" placeholder="Kurs Adı">
                        </div>
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="svg">SVG İkon</label>
                            <input type="text" class="form-control" value="{{$course->svg}}"
                                   name="svg" id="svg" placeholder="Svg ikon giriniz">
                        </div>
                        <div class="form-group">
                            <div class="form-check form-switch">
                                <input class="form-check-input" name="menu_status" type="checkbox"
                                       id="flexSwitchCheckDefault"
                                    {{$course->menu_status ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexSwitchCheckDefault">Menü Gösterim</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check form-switch">
                                <input class="form-check-input" name="category_status" type="checkbox"
                                       id="flexSwitchCheckDefault"
                                    {{$course->category_status ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexSwitchCheckDefault">Kategori Gösterim</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check form-switch">
                                <input class="form-check-input" name="status" type="checkbox"
                                       id="flexSwitchCheckDefault"
                                    {{$course->status ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexSwitchCheckDefault">Durum</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-number-input" class="form-control-label">Sıra</label>
                            <input class="form-control" type="number" name="order" style="width: 30%"
                                   value="{{$course->order}}"
                                   id="example-number-input">
                        </div>
                        <button type="submit" class="btn bg-gradient-primary my-2">Kaydet</button>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $course->id }}"
                                class="btn bg-gradient-danger my-2">Sil
                        </button>
                    </form>
                    <x-delete-modal modalId="deleteModal-{{ $course->id }}"
                                    title="Silme Onayı"
                                    body="Bu öğeyi silmek istediğinizden emin misiniz?"
                                    action="{{ route('panel.system.course.destroy', ['id' => $course->id]) }}">
                    </x-delete-modal>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush

