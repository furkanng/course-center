@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kurum Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kurumlar</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kurum Yorum Listesi</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Kurum Yorumları</h6>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex align-items-center justify-content-between">
                        <div class="me-3">
                            <h5 class="mb-0">Kurum Yorumları</h5>
                            <p class="text-sm mb-0">
                                Bu kuruma ait olan tüm yorumları görebilirsiniz.
                            </p>
                        </div>
                        <a href="{{route("panel.companies.comment.create",["company" => $company->id])}}"
                           class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; Yeni Yorum</a>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="products-list">
                            <thead class="thead-light">
                            <tr>
                                <th>Kullanıcı Adı</th>
                                <th>Kullanıcı Mail</th>
                                <th>Kullanıcı Telefon</th>
                                <th>Kullanıcı Puan</th>
                                <th>Durum</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td class="text-bolder text-sm">{{$comment->user->name}}</td>
                                    <td class="text-sm">{{$comment->user->email}}</td>
                                    <td class="text-sm">{{$comment->user->phone}}</td>
                                    <td class="text-sm">{{$comment->rating}} Yıldız</td>
                                    <td class="text-sm">
                                        <span
                                            class="badge {{$comment->status ? "badge-success": "badge-dark"}} badge-md">
                                            {{$comment->status ? "Yayında": "Pasif"}}
                                        </span>
                                    </td>
                                    <td class="text-sm">
                                        <a href="{{route("panel.companies.comment.edit",["id" => $comment->id])}}"
                                           class="mx-2" data-bs-toggle="tooltip"
                                           data-bs-original-title="Edit product">
                                            <i class="fas fa-edit text-secondary"></i>
                                        </a>
                                        <a href="#" class="mx-2" data-bs-toggle="modal"
                                           data-bs-target="#deleteModal-{{ $comment->id }}">
                                            <i class="fas fa-trash text-secondary"></i>
                                        </a>
                                    </td>
                                </tr>
                                <x-delete-modal modalId="deleteModal-{{ $comment->id }}"
                                                title="Silme Onayı"
                                                body="Bu öğeyi silmek istediğinizden emin misiniz?"
                                                action="{{ route('panel.companies.comment.destroy',
                                                ['id' => $comment->id]) }}">
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
        const dataTableSearch = new simpleDatatables.DataTable("#products-list", {
            searchable: true,
            fixedHeight: false,
        });
    </script>
@endpush
