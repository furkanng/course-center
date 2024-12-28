<div class="modal fade" id="{{ $modalId }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Fiyat Tipi</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-submit" method="POST" action="{{$action}}">
                <div class="modal-body">

                    @csrf
                    @method($method)
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Fiyat Başlık:</label>
                        <input class="form-control" value="{{$priceTitle}}" name="price_title" type="text" id="message-text"
                               required>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="status" type="checkbox"
                                   id="flexSwitchCheckDefault"
                                {{$status ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexSwitchCheckDefault">Durum</label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-gradient-primary">Kaydet</button>
                </div>
            </form>

        </div>
    </div>
</div>
