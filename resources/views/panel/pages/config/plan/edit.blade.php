@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Site Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="{{route('panel.config.plans.index')}}">Ödeme Planları</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Plan Düzenle</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Plan Düzenle</h6>
@endsection

@section('content')

    <div class="row mt-3">
        <div class="col-12 col-md-8 col-xl-6">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Plan Bilgileri</h6>
                </div>
                <div class="card-body p-3">
                    <form class="form-submit" method="POST" action="{{route('panel.config.plans.update', ['id' => $plan->id])}}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="name" class="form-control-label">Başlık</label>
                                    <input class="form-control" type="text" name="name" style="width: 100%" required
                                           id="name" value="{{ old('name', $plan->name) }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="price" class="form-control-label">Fiyat</label>
                                    <input class="form-control" type="number" name="price" style="width: 100%" required
                                           id="price" step="0.01" value="{{ old('price', $plan->price) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="type" class="form-control-label">Tip</label>
                                    <select class="form-control" name="type" id="type" required>
                                        <option value="{{\App\Enums\PaymentType::MOST_SEARCHED->value}}">
                                            {{\App\Enums\PaymentType::MOST_SEARCHED->label()}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="period" class="form-control-label">Periyot</label>
                                    <select class="form-control" name="period" id="period" required>
                                        @foreach(\App\Enums\PlanPeriod::cases() as $period)
                                            <option value="{{ $period->value }}" {{ old('period', $plan->period->value) === $period->value ? 'selected' : '' }}>
                                                {{ $period->label() }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label for="description" class="form-control-label">Açıklama</label>
                                    <textarea class="form-control" name="description" id="description" required>{{ old('description', $plan->description) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="status" type="checkbox" id="flexSwitchCheckDefault" {{ old('status', $plan->status) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Durum</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn bg-gradient-primary">Güncelle</button>
                        <a href="{{route('panel.config.plans.index')}}" class="btn bg-gradient-secondary">Geri Dön</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
