@extends('panel.layout.app')

@section('title', 'Home Page')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row my-3">
                    <div class="col">
                        <h4 class="card-title">Kurslar</h4>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <a href="{{route('panel.manager.course.create')}}">
                            <button type="button" class="btn btn-gradient-info btn-fw">Ekle</button>
                        </a>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Ad</th>
                        <th>Durum</th>
                        <th>Navbar Durum</th>
                        <th>Kategori Durum</th>
                        <th>Son Güncelleme</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td>{{$course["name"]}}</td>
                            <td>
                                @if($course["status"] == 1)
                                    <button type="button" class="btn btn-success btn-sm">Aktif</button>
                                @else
                                    <button type="button" class="btn btn-danger btn-sm">Pasif</button>
                                @endif
                            </td>
                            <td>
                                @if($course["menu_status"] == 1)
                                    <button type="button" class="btn btn-success btn-sm">Aktif</button>
                                @else
                                    <button type="button" class="btn btn-danger btn-sm">Pasif</button>
                                @endif
                            </td>
                            <td>
                                @if($course["category_status"] == 1)
                                    <button type="button" class="btn btn-success btn-sm">Aktif</button>
                                @else
                                    <button type="button" class="btn btn-danger btn-sm">Pasif</button>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($course["updated_at"])->diffForHumans() }}</td>
                            <td class="d-flex">
                                <a href="{{route("panel.manager.course.edit",["id" => $course["id"]])}}">
                                    <button type="button" class="btn btn-primary btn-sm">Düzenle</button>
                                </a>

                                <form class="forms-sample mx-1"
                                      action="{{route("panel.manager.course.destroy",["id" => $course["id"]])}}"
                                      method="post">
                                    @method("DELETE")
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Sil</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
