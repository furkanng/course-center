@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Site Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Siparişler</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Siparişler Listesi</h6>
@endsection

@section('content')

    <div class="row mt-3">
        <div class="col-12 col-md-8 col-xl-6">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Ödeme Planı Detayları</h6>
                    <p class="text-sm mb-0">
                        Kurumsal Kullanıcıların ödemesi için fatura oluşturabilirsiniz.<br>
                        Toplam Fiyat = Birim fiyat x Kayıt Sayısı
                    </p>
                </div>
                <div class="card-body p-3">
                    <form class="form-submit" method="POST"
                          action="{{route("panel.config.orders.store")}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="course">Kurumsal Listesi</label>
                                    <select class="form-control" name="user_id" required id="choices-country">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="example-number-input" class="form-control-label">Birim Fiyat</label>
                                    <input class="form-control" type="number" name="price" style="width: 100%" required
                                           id="price">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="course">Tip</label>
                                    <select class="form-control" name="type" required>
                                        <option value="{{\App\Enums\PaymentType::GUEST_REGISTER->value}}">
                                            {{\App\Enums\PaymentType::GUEST_REGISTER->label()}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="course">Kayıt Sayısı</label>
                                    <input class="form-control" type="number" value="1" min="1" name="piece"
                                           style="width: 100%"
                                           required
                                           id="price">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label for="example-number-input" class="form-control-label">Açıklama</label>
                                    <textarea class="form-control" type="text" name="description" id="description"
                                              required></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn bg-gradient-primary my-2">Sipariş Oluştur</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        if (document.getElementById('choices-country')) {
            var country = document.getElementById('choices-country');
            const example = new Choices(country);
        }
    </script>
@endpush

