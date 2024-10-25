@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kurum Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kurumlar</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kurum Talep Listesi</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Taleplerim</h6>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex align-items-center justify-content-between">
                        <div class="me-3">
                            <h5 class="mb-0">Kurum Taleplerim</h5>
                            <p class="text-sm mb-0">
                                Talep etmiş olduğunuz kurumların listesini görebilir. Evraklarınızı yükleyebilirsiniz.
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
                                <th>Mernis</th>
                                <th>Evrak Durumu</th>
                                <th>Durum</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($requests as $request)
                                <tr>
                                    <td class="text-bolder text-sm">{{$request->company->name}}</td>
                                    <td class="text-sm">{{$request->company->mernis ?? "Bilinmiyor"}}</td>
                                    <td class="text-sm">
                                        <span class="badge {{$request->approve ? "badge-success" : "badge-danger"}}
                                            badge-md">
                                            {{$request->approve ? "Gönderildi": "Gönderilmedi"}}
                                        </span>
                                    </td>
                                    <td class="text-sm">
                                        <span class="badge badge-info badge-md">
                                            {{$request->status->label()}}
                                        </span>
                                    </td>
                                    <td class="text-sm">
                                        <a href="{{route("merchant.companies.my-request.edit",["id" => $request->id])}}">
                                            <button class="btn btn-sm bg-gradient-dark ms-auto mb-0" type="button">
                                                Detay
                                            </button>
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
        document.addEventListener('DOMContentLoaded', function () {
            fetchProvinces();
            formatPhoneNumber();
        });
    </script>
    <script>
        const dataTableSearch = new simpleDatatables.DataTable("#products-list", {
            searchable: true,
            fixedHeight: false,
        });

        if (document.getElementById('choices-category-edit')) {
            var element = document.getElementById('choices-category-edit');
            new Choices(element, {
                searchEnabled: false
            });
        }
    </script>
@endpush
