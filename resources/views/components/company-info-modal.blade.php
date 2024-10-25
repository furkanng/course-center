<div class="modal fade" id="{{ $modalId }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-lg-flex">
                    <div>
                        <h5 class="mb-0">Kurum Bilgisi</h5>
                        <p class="text-sm mb-0">
                            Kurumun size ait olduğuna eminseniz talep ediniz.
                        </p>
                    </div>
                </div>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-submit" method="POST" action="{{route("merchant.companies.request.store")}}">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Kurum Adı:</label>
                                <input class="form-control" disabled value="{{$name}}" id="message-text">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Kurum Tipi:</label>
                                <input class="form-control" disabled value="{{$companyType}}" id="message-text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Mernis No:</label>
                                <input class="form-control" disabled value="{{$mernis}}" id="message-text">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Kurum Adresi:</label>
                                <input class="form-control" disabled value="{{$address}}" id="message-text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">İl:</label>
                                <input class="form-control" disabled value="{{$city}}" id="message-text">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">İlçe:</label>
                                <input class="form-control" disabled value="{{$district}}" id="message-text">
                            </div>
                        </div>
                    </div>
                </div>
                <input class="form-control" hidden="" name="company_id" value="{{$companyId}}">
                <div class="modal-footer">
                    <button type="submit" class="btn bg-gradient-primary">Talep Et</button>
                </div>
            </form>
        </div>
    </div>
</div>
