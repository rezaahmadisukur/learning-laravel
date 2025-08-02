<div class="modal fade" id="confirmationDelete-{{ $resident->id }}" tabindex="-1"
    aria-labelledby="confirmationDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="/resident/{{ $resident->id }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="confirmationDeleteLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Apakah kamu yakin akan menghapus data</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger" id="confirmDelete">Hapus</button>
                </div>
            </div>
        </form>
    </div>
</div>
