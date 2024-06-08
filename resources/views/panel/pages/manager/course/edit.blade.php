@extends('panel.layout.app')

@section('title', 'Home Page')
@section('content')
    <div class="col-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Kurs Düzenle</h4>
                <p class="card-description">Düzenlemek istediğiniz kurs bilgilerini doldurunuz.</p>
                <form class="forms-sample" action="{{route("panel.manager.course.update",["id" => $course["id"]])}}"
                      method="POST">
                    @method("PUT")
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Kurs Adı</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName1"
                               placeholder="Kurs Adı" value="{{$course["name"]}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Svg İkon</label>
                        <textarea class="form-control" name="svg" id="exampleTextarea1"
                                  rows="4">{{$course["svg"]}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Renk Paleti</label>
                        <select class="form-select" id="exampleSelectGender" name="color">
                            <option value="">Seçiniz</option>
                            <option value="pink-bg" {{ old('color', $course["color"]) == 'pink-bg' ? 'selected' : '' }}>Pembe</option>
                            <option value="green-bg" {{ old('color', $course["color"]) == 'green-bg' ? 'selected' : '' }}>Yeşil</option>
                            <option value="orange-bg" {{ old('color', $course["color"]) == 'orange-bg' ? 'selected' : '' }}>Turuncu</option>
                            <option value="purple-bg" {{ old('color', $course["color"]) == 'purple-bg' ? 'selected' : '' }}>Mor</option>
                            <option value="green-bg-2" {{ old('color', $course["color"]) == 'green-bg-2' ? 'selected' : '' }}>Koyu Yeşil</option>
                            <option value="yellow-bg" {{ old('color', $course["color"]) == 'yellow-bg' ? 'selected' : '' }}>Sarı</option>
                            <option value="violet-bg" {{ old('color', $course["color"]) == 'violet-bg' ? 'selected' : '' }}>Viyolet</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Sıra</label>
                        <input type="number" class="form-control" id="exampleInputEmail3"
                               placeholder="Sayı Giriniz" name="order" value="{{$course["order"]}}">
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" name="menu_status" class="form-check-input"
                                    {{ $course["menu_status"] == 1 ? 'checked' : '' }}>Üst Menü Görünme
                                <i class="input-helper"></i>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" name="category_status" class="form-check-input"
                                    {{ $course["category_status"] == 1 ? 'checked' : '' }}>Kategori Menü Görünme
                                <i class="input-helper"></i>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-success">
                            <label class="form-check-label">
                                <input type="checkbox" name="status" class="form-check-input"
                                    {{ $course["status"] == 1 ? 'checked' : '' }}>Yayınlanma Durumu
                                <i class="input-helper"></i>
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>

@endsection
