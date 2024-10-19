<div class="modal fade" id="{{ $modalId }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Soru Cevap</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-submit" method="POST" action="{{$action}}">
                <div class="modal-body">

                    @csrf
                    @method($method)
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Soru:</label>
                        <input name="question" value="{{$question}}" id="message-text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Cevap:</label>
                        <input class="form-control" value="{{$answer}}" name="answer" id="message-text" required>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Durum:</label>
                                <select class="form-control" name="status" required>
                                    <option value="1" {{$status == 1 ? 'selected' : ''}}>Aktif</option>
                                    <option value="0" {{$status == 0 ? 'selected' : ''}}>Pasif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <label for="recipient-name" class="col-form-label">Sıra:</label>
                            <input type="number" value="{{$order}}" name="order" class="form-control"
                                   id="recipient-name">
                        </div>
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
