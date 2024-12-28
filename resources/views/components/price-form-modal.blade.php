<div class="modal fade" id="{{ $modalId }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Fiyat Bilgisi</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-submit" method="POST" action="{{$action}}">
                <div class="modal-body">

                    @csrf
                    @method($method)
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Fiyat Başlık:</label>
                        <select class="form-control" name="price_field_id" required>
                            <option>Seçiniz</option>
                            @foreach(\App\Models\PriceField::where('status','1')->get() as $priceField)
                                <option value="{{$priceField->id}}"
                                    {{$priceField->id == $title ? 'selected' : ''}}>
                                    {{$priceField->price_title}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Fiyat:</label>
                        <input class="form-control" value="{{$price}}" name="price" type="number" id="message-text"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">İndirimli Fiyat:</label>
                        <input class="form-control" value="{{$discounted}}" name="discounted_price" type="number"
                               id="message-text">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Durum:</label>
                        <select class="form-control" name="status" required>
                            <option value="1" {{$status == 1 ? 'selected' : ''}}>Aktif</option>
                            <option value="0" {{$status == 0 ? 'selected' : ''}}>Pasif</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-gradient-primary">Kaydet</button>
                </div>
            </form>
            @if($method == "PUT")
                <div class="modal-footer">
                    <form method="POST" action="{{ $action }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn bg-gradient-secondary">Sil</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
