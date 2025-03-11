@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Site Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="{{route("panel.config.pages.index")}}">Sayfa Listesi</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Sayfa Düzenle</li>
@endsection

@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Sayfa Düzenle</h6>
@endsection

@section('content')

    <div class="row mt-3">
        <div class="col-12 col-md-12 col-xl-12">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Sayfa Detayları</h6>
                </div>
                <div class="card-body p-3">
                    <form class="form-submit" method="POST"
                          action="{{route("panel.config.pages.update",["id" =>$page->id])}}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="title">Başlık</label>
                                    <input type="text" class="form-control" value="{{$page->title}}"
                                           name="title" id="title" placeholder="Sayfa Başlık">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="course">Durum</label>
                                    <select class="form-control" name="status" required>
                                        <option value="1" {{$page->status == 1 ? 'selected' : ''}}>Aktif</option>
                                        <option value="0" {{$page->status == 0 ? 'selected' : ''}}>Pasif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="course">Sabit</label>
                                    <input type="text" class="form-control"
                                           value="{{$page->permament ? "Evet" : "Hayır"}}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="course">İçerik</label>
                                    <textarea name="content" id="content" rows="10" cols="80">{!! $page->content !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn bg-gradient-primary my-2">Kaydet</button>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $page->id }}"
                                class="btn bg-gradient-danger my-2">Sil
                        </button>
                    </form>
                    <x-delete-modal modalId="deleteModal-{{ $page->id }}"
                                    title="Silme Onayı"
                                    body="Bu öğeyi silmek istediğinizden emin misiniz?"
                                    action="{{ route('panel.config.pages.destroy', ['id' => $page->id]) }}">
                    </x-delete-modal>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        if (document.getElementById('edit-deschiption-edit')) {
            var quill = new Quill('#edit-deschiption-edit', {
                theme: 'snow',
                height: '200'
            });
        }

        var form = document.querySelector('.form-submit');
        form.addEventListener('submit', function () {
            var contentInput = document.getElementById('content');
            contentInput.value = quill.root.innerHTML;
        });
    </script>
    <script>
        CKEDITOR.replace('content');
    </script>
@endpush

