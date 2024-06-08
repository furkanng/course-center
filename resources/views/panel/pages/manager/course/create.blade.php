@extends('panel.layout.app')

@section('title', 'Home Page')
@section('content')
    <div class="col-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Yeni Kurs Ekle</h4>
                <p class="card-description">Eklemek istediğiniz kurs bilgilerini doldurunuz.</p>
                <form class="forms-sample" action="{{route("panel.manager.course.store")}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Kurs Adı</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName1"
                               placeholder="Kurs Adı">
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Svg İkon</label>
                        <textarea class="form-control" name="svg" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Renk Paleti</label>
                        <select class="form-select" id="exampleSelectGender" name="color">
                            <option value="">Seçiniz</option>
                            <option value="pink-bg">Pembe</option>
                            <option value="green-bg">Yeşil</option>
                            <option value="orange-bg">Turuncu</option>
                            <option value="purple-bg">Mor</option>
                            <option value="green-bg-2">Koyu Yeşil</option>
                            <option value="yellow-bg">Sarı</option>
                            <option value="violet-bg">Viyolet</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Sıra</label>
                        <input type="number" class="form-control" id="exampleInputEmail3"
                               placeholder="Sayı Giriniz" name="order">
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" name="menu_status" class="form-check-input">Üst Menü
                                Görünme<i
                                    class="input-helper"></i></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" name="category_status" class="form-check-input">Kategori Menü
                                Görünme<i
                                    class="input-helper"></i></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-success">
                            <label class="form-check-label">
                                <input type="checkbox" name="status" class="form-check-input" checked>Yayınlanma
                                Durumu<i
                                    class="input-helper"></i></label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>

@endsection
