@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kurum Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kurumlar</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kurum Listesi</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Kurum Listesi</h6>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Tüm Kurumlar</h5>
                            <p class="text-sm mb-0">
                                Sistemde kayıtlı olan tüm kurumları görebilir ve düzenleyebilirsiniz.
                            </p>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="{{route("panel.companies.company.create")}}"
                                   class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; Yeni Kurum</a>
                                <button type="button" class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal"
                                        data-bs-target="#import">
                                    Import
                                </button>
                                <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog mt-lg-10">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ModalLabel">Import CSV</h5>
                                                <i class="fas fa-upload ms-3"></i>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>You can browse your computer for a file.</p>
                                                <input type="text" placeholder="Browse file..."
                                                       class="form-control mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                           id="importCheck" checked="">
                                                    <label class="custom-control-label" for="importCheck">I accept the
                                                        terms and conditions</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-gradient-secondary btn-sm"
                                                        data-bs-dismiss="modal">Close
                                                </button>
                                                <button type="button" class="btn bg-gradient-primary btn-sm">Upload
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv"
                                        type="button" name="button">Export
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="products-list">
                            <thead class="thead-light">
                            <tr>
                                <th>Kurum</th>
                                <th>Kurum Tipi</th>
                                <th>Mernis</th>
                                <th>Şehir</th>
                                <th>Sahiplik</th>
                                <th>Durum</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <div class="form-check my-auto">
                                                <input class="form-check-input" type="checkbox" id="customCheck1">
                                            </div>
                                            <h6 class="ms-3 my-auto text-sm">{{$company->name}}</h6>
                                        </div>
                                    </td>
                                    <td class="text-sm">{{$company->getCompanyTypeName()}}</td>
                                    <td class="text-sm">{{$company->mernis ?? "Bilinmiyor"}}</td>
                                    <td class="text-sm">{{$company->city}}</td>
                                    <td>
                                        <span
                                            class="badge {{count($company->users) === 0 ? "badge-danger" : "badge-info"}}
                                             badge-sm">
                                            {{count($company->users) === 0  ? "Sahipsiz" : "Atandı"}}
                                        </span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge {{$company->status ? "badge-success" : "badge-danger"}} badge-sm">
                                            {{$company->status ? "Yayında" : "Pasif"}}
                                        </span>
                                    </td>
                                    <td class="text-sm">
                                        <a href="{{route("panel.companies.comment.index",["company" => $company->id])}}"
                                           class="mx-2" data-bs-toggle="tooltip"
                                           data-bs-original-title="comments">
                                            <i class="fa fa-comment text-secondary"></i>
                                        </a>
                                        <a href="{{route("panel.companies.user.index",["company" => $company->id])}}"
                                           class="mx-2" data-bs-toggle="tooltip"
                                           data-bs-original-title="New İmage">
                                            <i class="fa fa-user text-secondary"></i>
                                        </a>
                                        <a href="{{route("panel.companies.image.index",["company" => $company->id])}}"
                                           class="mx-2" data-bs-toggle="tooltip"
                                           data-bs-original-title="New İmage">
                                            <i class="fa fa-image text-secondary"></i>
                                        </a>
                                        <a href="{{route("panel.companies.company.edit",["id" => $company->id])}}"
                                           class="mx-2" data-bs-toggle="tooltip"
                                           data-bs-original-title="Edit product">
                                            <i class="fas fa-edit text-secondary"></i>
                                        </a>
                                        <a href="#" class="mx-2" data-bs-toggle="modal"
                                           data-bs-target="#deleteModal-{{ $company->id }}">
                                            <i class="fas fa-trash text-secondary"></i>
                                        </a>
                                    </td>
                                </tr>
                                <x-delete-modal modalId="deleteModal-{{ $company->id }}"
                                                title="Silme Onayı"
                                                body="Bu öğeyi silmek istediğinizden emin misiniz?"
                                                action="{{ route('panel.companies.company.destroy',
                                                ['id' => $company->id]) }}">
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

        document.querySelectorAll(".export").forEach(function (el) {
            el.addEventListener("click", function (e) {
                var type = el.dataset.type;

                var data = {
                    type: type,
                    filename: "soft-ui-" + type,
                };

                if (type === "csv") {
                    data.columnDelimiter = "|";
                }

                dataTableSearch.export(data);
            });
        });
    </script>
@endpush
