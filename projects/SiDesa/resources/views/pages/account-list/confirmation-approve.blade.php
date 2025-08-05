<div class="modal fade" id="confirmationApprove-{{ $user->id }}" tabindex="-1"
    aria-labelledby="confirmationApproveLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="/account-request/approval/{{ $user->id }}" method="post">
            @csrf
            @method('POST')
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="confirmationApproveLabel">Konfirmasi Aktifkan</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="for" value="activate">
                    <p class="mb-0">Apakah kamu yakin akan mengaktifkan user ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success" id="confirmDelete">Ya!</button>
                </div>
            </div>
        </form>
    </div>
</div>
