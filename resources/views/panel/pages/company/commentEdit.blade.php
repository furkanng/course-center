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
    <h6 class="font-weight-bolder mb-0">Kurum Yorum Detay</h6>
@endsection

@section('content')
    <div class="row mt-3">
        <div class="col-12 col-md-8 col-xl-6">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Yorum Detayları</h6>
                </div>
                <div class="card-body p-3">
                    <form class="form-submit" method="POST"
                          action="{{route("panel.companies.comment.update",["id" =>$comment->id])}}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-number-input" class="form-control-label">İsim</label>
                                    <input class="form-control" type="text" style="width: 100%"
                                           value="{{$comment->user->name}}"
                                           id="name" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-number-input" class="form-control-label">Email</label>
                                    <input class="form-control" type="text" style="width: 100%"
                                           value="{{$comment->user->email}}"
                                           id="email" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-number-input" class="form-control-label">Telefon</label>
                                    <input class="form-control" type="text" style="width: 100%"
                                           value="{{$comment->user->phone}}"
                                           maxlength="10"
                                           oninput="formatPhoneNumber(this)"
                                           id="phone" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-number-input" class="form-control-label">Puan</label>
                                    <input class="form-control" type="text" style="width: 100%"
                                           value="{{$comment->rating}} Yıldız" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-number-input" class="form-control-label">Yorum</label>
                                <textarea class="form-control" type="text" style="width: 100%"
                                          disabled>{{$comment->comment}}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="status" type="checkbox"
                                               id="flexSwitchCheckDefault"
                                            {{$comment->status ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Durum</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn bg-gradient-primary my-2">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
