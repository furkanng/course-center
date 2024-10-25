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
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Tüm Kurumlarım</h5>
                            <p class="text-sm mb-0">
                                Size ait olan olan tüm kurumları görebilir ve düzenleyebilirsiniz.
                            </p>
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
                                            class="badge {{$company->status ? "badge-success" : "badge-danger"}} badge-sm">
                                            {{$company->status ? "Yayında" : "Pasif"}}
                                        </span>
                                    </td>
                                    <td class="text-sm">
                                        <a href="{{route("merchant.companies.image.index",["company" => $company->id])}}"
                                           class="mx-3" data-bs-toggle="tooltip"
                                           data-bs-original-title="New İmage">
                                            <i class="fa fa-image text-secondary"></i>
                                        </a>
                                        <a href="{{route("merchant.companies.company.edit",["id" => $company->id])}}"
                                            data-bs-toggle="tooltip"
                                           data-bs-original-title="Edit product">
                                            <i class="fas fa-edit text-secondary"></i>
                                        </a>
                                    </td>
                                </tr>
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
