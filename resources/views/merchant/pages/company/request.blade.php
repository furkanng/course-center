@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kurum Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kurumlar</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kurum Talep</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Kurum Listesi</h6>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex align-items-center justify-content-between">
                        <div class="me-3">
                            <h5 class="mb-0">Tüm Kurumlar</h5>
                            <p class="text-sm mb-0">
                                Talep etmek istediğiniz kurumu seçiniz. Eğer kurumunuz bu alanda yoksa kendi kurumunuzu
                                ekleyebilirsiniz.
                            </p>
                        </div>
                        <a href="{{ route('merchant.companies.company.create') }}"
                           class="btn bg-gradient-primary mb-0">+&nbsp; Yeni Kurum</a>
                    </div>

                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="products-list">
                            <thead class="thead-light">
                            <tr>
                                <th>Kurum</th>
                                <th>Mernis</th>
                                <th>Şehir</th>
                                <th>İlçe</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td class="text-bolder text-sm">{{$company->name}}</td>
                                    <td class="text-sm">{{$company->mernis ?? "Bilinmiyor"}}</td>
                                    <td class="text-sm">{{$company->city}}</td>
                                    <td class="text-sm">{{$company->district}}</td>
                                    <td class="text-sm">
                                        <a href="#" data-bs-toggle="modal"
                                           data-bs-target="#companyInfoModal{{$company->id}}">
                                            <button class="btn btn-sm bg-gradient-dark ms-auto mb-0
                                            {{count($company->request) > 0 ? "disabled" : ""}}" type="button">
                                                Talep Et
                                            </button>
                                        </a>
                                        <x-company-info-modal
                                            modalId="companyInfoModal{{ $company->id }}"
                                            name="{{$company->name}}"
                                            companyType="{{$company->getCompanyTypeName()}}"
                                            mernis="{{$company->mernis}}"
                                            address="{{$company->address}}"
                                            city="{{$company->city}}"
                                            district="{{$company->district}}"
                                            companyId="{{$company->id}}"
                                        >
                                        </x-company-info-modal>
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
