<div class="modal fade" id="confirmationApprove-{{ $user->id }}" tabindex="-1"
    aria-labelledby="confirmationApproveLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="/account-request/approval/{{ $user->id }}" method="post">
            @csrf
            @method('POST')
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="confirmationApproveLabel">Konfirmasi Setujui</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="for" value="approve">
                    <p class="mb-0">Apakah kamu yakin akan menyetujui user ini?</p>
                    <div class="form-group mt-3">
                        <label for="resident_id">Pilih Penduduk</label>
                        <select name="resident_id" id="resident_id" class="form-control">
                            <option value="">Tidak ada</option>
                            @foreach ($residents as $resident)
                                <option value="{{ $resident->id }}">{{ $resident->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success" id="confirmDelete">Ya, Setujui!</button>
                </div>
            </div>
        </form>
    </div>
</div>
