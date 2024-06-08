@extends('panel.layout.app')

@section('title', 'Home Page')
@section('content')
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Slider Ayarları</h4>
                    <form action="{{route("panel.frontend.dashboard.store")}}" enctype="multipart/form-data"
                          method="POST" class="forms-sample my-4">
                        @csrf
                        @foreach($sliders as $key)
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{$key["title"]}}</label>
                                <input type="{{$key["type"]}}" class="form-control" id="exampleInputUsername1"
                                       name="{{$key["key"]}}" value="{{$key["value"]}}">
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-gradient-primary me-2">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Kategori Ayarları</h4>
                    <form action="{{route("panel.frontend.dashboard.store")}}" enctype="multipart/form-data"
                          method="POST" class="forms-sample my-4">
                        @csrf
                        @foreach($categories as $key)
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{$key["title"]}}</label>
                                <input type="{{$key["type"]}}" class="form-control" id="exampleInputUsername1"
                                       name="{{$key["key"]}}" value="{{$key["value"]}}">
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-gradient-primary me-2">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Araştırma Ayarları</h4>
                    <form action="{{route("panel.frontend.dashboard.store")}}" enctype="multipart/form-data"
                          method="POST" class="forms-sample my-4">
                        @csrf
                        @foreach($researches as $key)
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{$key["title"]}}</label>
                                <input type="{{$key["type"]}}" class="form-control" id="exampleInputUsername1"
                                       name="{{$key["key"]}}" value="{{$key["value"]}}">
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-gradient-primary me-2">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
