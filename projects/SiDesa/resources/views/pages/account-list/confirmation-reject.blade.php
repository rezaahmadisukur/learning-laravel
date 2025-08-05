<div class="modal fade" id="confirmationReject-{{ $user->id }}" tabindex="-1" aria-labelledby="confirmationRejectLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="/account-request/approval/{{ $user->id }}" method="post">
            @csrf
            @method('POST')
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="confirmationRejectLabel">Konfirmasi Non-aktikan</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="for" value="deactivate">
                    <p class="mb-0">Apakah kamu yakin akan menon-aktifkan user ini ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger" id="confirmDelete">Ya!</button>
                </div>
            </div>
        </form>
    </div>
</div>
