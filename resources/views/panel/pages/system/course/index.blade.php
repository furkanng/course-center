@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Sistem Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kurs Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kurs Listesi</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Kurs Listesi</h6>
@endsection

@section('content')

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Tüm Kurslar</h5>
                            <p class="text-sm mb-0">
                                Site içerisindeki tüm kursları düzenleyebilirsiniz.
                            </p>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="{{route("panel.system.course.create")}}"
                                   class="btn bg-gradient-primary btn-sm mb-0">+&nbsp;Yeni Kurs</a>
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
                                    Kurs
                                </th>
                                <th>
                                    Menu Gösterim
                                </th>
                                <th>
                                    Kategori Gösterim
                                </th>
                                <th>
                                    Durum
                                </th>
                                <th>
                                    Sıra
                                </th>
                                <th>
                                    İşlemler
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                                <tr>
                                    <td class="text-sm">
                                        <div class="d-flex px-2">
                                            <div
                                                class="avatar avatar-sm rounded-circle me-2"> {!! $course->icons !!} </div>
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-xs">{{$course->name}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-sm">
                                        @if($course->menu_status === 1)
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
                                        @if($course->category_status === 1)
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
                                        @if($course->status === 1)
                                            <span class="badge badge-dot me-4">
                                                <i class="bg-success"></i>
                                                <span class="text-dark text-xs">Yayında</span>
                                            </span>
                                        @else
                                            <span class="badge badge-dot me-4">
                                               <i class="bg-danger"></i>
                                               <span class="text-dark text-xs">Pasif</span>
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-sm">
                                        <button class="btn btn-link text-secondary mb-0">
                                            <span class="text-dark text-xs">{{$course->order}}</span>
                                        </button>
                                    </td>
                                    <td class="text-sm">
                                        <a href="{{route("panel.system.course.edit",["id" => $course->id])}}"
                                           class="mx-3">
                                            <i class="fas fa-edit text-secondary text-sm"></i>
                                        </a>
                                        <a href="#" data-bs-toggle="modal"
                                           data-bs-target="#deleteModal-{{ $course->id }}">
                                            <i class="fas fa-trash-alt text-secondary text-sm"></i>
                                        </a>
                                    </td>
                                </tr>
                                <x-delete-modal modalId="deleteModal-{{ $course->id }}"
                                                title="Silme Onayı"
                                                body="Bu öğeyi silmek istediğinizden emin misiniz?"
                                                action="{{ route('panel.system.course.destroy', ['id' => $course->id]) }}">
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

