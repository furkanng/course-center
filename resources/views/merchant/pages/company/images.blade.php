@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Kurum Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="{{route("merchant.companies.company.index")}}">Kurum Listesi</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kurum Resimleri</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Kurum Resimleri</h6>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-9 col-12 mx-auto">
            <div class="card card-body mt-4">
                <h6 class="mb-0">Resim Ekle & Düzenle</h6>
                <hr class="horizontal dark my-3">
                <label class="mt-4 form-label">Resim yüklemek için tıklayınız <span style="color:red">(Tek seferde görsel yükleme sınırı 20 adettir!) </span></label>
                <form action="/file-upload" class="form-control dropzone" id="dropzone">
                    <div class="fallback">
                        <input name="image" type="file" multiple/>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body p-3">
                    <div class="row">
                        @foreach($images as $index => $image)
                            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                <div class="card card-blog card-plain position-relative">
                                    <div class="position-relative">
                                        <a href="{{$image->image_url}}"
                                           class="d-block shadow-xl border-radius-xl d-flex justify-content-center">
                                            <img src="{{$image->image_url}}"
                                                 alt="img-blur-shadow"
                                                 class="img-fluid shadow border-radius-xl height-150">
                                        </a>
                                        <a class="btn btn-link text-danger text-gradient px-3 mb-0 position-absolute top-0 end-0 m-2"
                                           href="#" data-bs-toggle="modal"
                                           data-bs-target="#deleteModal-{{ $index }}">
                                            <i class="far fa-trash-alt me-2"></i>
                                        </a>
                                    </div>
                                    <span
                                        class="text-gradient {{$image->status ? "text-primary" : "text-info"}} text-uppercase text-xs font-weight-bold mt-3 d-flex justify-content-center">
                                        {{$image->status ? "Onaylandı" : "Onay Bekliyor"}}
                                    </span>
                                </div>
                            </div>

                            <x-delete-modal modalId="deleteModal-{{ $index }}"
                                            title="Silme Onayı"
                                            body="Bu öğeyi silmek istediğinizden emin misiniz?"
                                            action="{{ route('merchant.companies.image.destroy', ['id' => $image->id]) }}">
                            </x-delete-modal>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push("style")

@endpush

@push('scripts')
    <script>
        if (Dropzone.instances.length > 0) {
            Dropzone.instances.forEach(dz => dz.destroy());
        }

        Dropzone.autoDiscover = true;
        var dropzoneElement = document.getElementById('dropzone');

        var myDropzone = new Dropzone("#dropzone", {
            url: "{{ route('merchant.companies.image.store', ['company' => $company->id]) }}",
            method: 'post',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            paramName: "image",
            uploadMultiple: true,
            addRemoveLinks: true,
            parallelUploads: 20,
            success: function(file, response){
                console.log("Resim yüklendi", response);
            },
            error: function(file, response){
                console.log("Hata oluştu", response);
            },
            init: function () {
                this.on("addedfile", function (file) {
                    console.log("Dosya eklendi:", file);
                });

                this.on("queuecomplete", function () {
                    console.log("Tüm dosyalar yüklendi.");
                });
            }
        });
    </script>
@endpush

