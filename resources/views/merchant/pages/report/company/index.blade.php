@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Raporlar</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kurum Raporları</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Kurum Raporları</h6>
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
                                Tüm kurumların detaylı analiz raporlarını görebilirsiniz
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card-body px-0 pb-0">
                    <div class="d-flex justify-content-end align-items-center mb-3">

                        <div class="form-group col-md-2">
                            <form action="{{ route('merchant.reports.companies.index') }}" method="GET">
                                <input type="text" class="form-control" name="filter" placeholder="Ara..."
                                       value="{{ request('filter') }}">
                            </form>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-flush" id="products-list">
                            <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Kurum</th>
                                <th>Şehir</th>
                                <th>Toplam Tıklanma</th>
                                <th>Tekil Tıklanma</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td class="text-center text-sm">{{$company->id}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <h6 class="my-auto text-sm">{{$company->name}}</h6>
                                        </div>
                                    </td>
                                    <td class="text-center text-sm">{{$company->city}}</td>
                                    <td class="text-center text-sm">
                                        <span
                                            class="badge badge-info badge-sm">
                                            {{$company->total_visits}}
                                        </span>
                                    </td>
                                    <td class="text-center text-sm">
                                         <span
                                             class="badge badge-info badge-sm">
                                            {{$company->unique_visits}}
                                        </span>
                                    </td>
                                    <td class="text-center text-sm">
                                        <a href="{{route("merchant.companies.company.edit",["id" => $company->id])}}"
                                           target="_blank" class="mx-2" data-bs-toggle="tooltip"
                                           data-bs-original-title="Kurum Bilgisi">
                                            <i class="fa fa-edit text-secondary"></i>
                                        </a>
                                        <a href="{{route("merchant.reports.companies.show",["company_id" => $company->id])}}"
                                           class="mx-2" data-bs-toggle="tooltip"
                                           data-bs-original-title="Rapor Detayı">
                                            <i class="fa fa-eye text-secondary"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{ $companies->links('panel.pagination.custom-pagination') }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
