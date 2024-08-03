@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Site Yönetimi</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Site Resimleri</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Site Resimleri</h6>
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body p-3">
                    <div class="row">
                        @foreach($images as $index => $image)
                            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                <div class="card card-blog card-plain position-relative">
                                    <div class="position-relative">
                                        @if($image->image)
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
                                        @else
                                            <a href="{{asset("images/no_image.jpg")}}"
                                               class="d-block shadow-xl border-radius-xl d-flex justify-content-center">
                                                <img src="{{asset("images/no_image.jpg")}}"
                                                     alt="img-blur-shadow"
                                                     class="img-fluid shadow border-radius-xl height-150">
                                            </a>
                                        @endif
                                    </div>
                                    <span
                                        class="text-gradient text-primary text-uppercase text-xs font-weight-bold mt-3 d-flex justify-content-center">
                                        {{$image->key}}
                                    </span>
                                    <form action="{{route("panel.config.image.update",["id" => $image->id])}}"
                                          method="POST"
                                          enctype="multipart/form-data"
                                          id="image-upload-form-{{ $index }}">
                                        @csrf
                                        @method("PUT")
                                        <input type="file" name="image" class="form-control"
                                               id="file-input-{{ $index }}" hidden>
                                        <button type="button" class="btn btn-primary btn-md w-100 mt-3"
                                                id="upload-button-{{ $index }}">Resim Yükle
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <x-delete-modal modalId="deleteModal-{{ $index }}"
                                            title="Silme Onayı"
                                            body="Bu öğeyi silmek istediğinizden emin misiniz?"
                                            action="{{ route('panel.config.image.destroy', ['id' => $image->id]) }}">
                            </x-delete-modal>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .position-relative {
        position: relative;
    }

    .position-absolute {
        position: absolute;
        top: 0;
        right: 0;
    }

    .btn-link {
        padding: 0.5rem; /* Gerekirse padding ayarlayın */
    }
</style>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const uploadButtons = document.querySelectorAll('[id^="upload-button-"]');

            uploadButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const index = this.id.split('-').pop(); // Benzersiz index'i al
                    const fileInput = document.getElementById(`file-input-${index}`);
                    fileInput.click();
                });
            });

            const fileInputs = document.querySelectorAll('[id^="file-input-"]');

            fileInputs.forEach(input => {
                input.addEventListener('change', function () {
                    const index = this.id.split('-').pop(); // Benzersiz index'i al
                    const form = document.getElementById(`image-upload-form-${index}`);
                    form.submit();
                });
            });
        });
    </script>

@endpush

