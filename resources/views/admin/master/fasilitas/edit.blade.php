<div class="modal fade" id="EditFasilitas-{{ $fasilitas->id }}" tabindex="-1" aria-labelledby="EditFasilitasLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditFasilitasLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="fasilitasUpdate" action="{{ route('admin.fasilitasUpdate', $fasilitas->id) }}" method="POST"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- Form atau Konten Modal -->
                    @csrf
                    <div class="mb-3">
                        <label for="nama_fasilitas" class="form-label">Nama Fasilitas</label>
                        <input type="text" class="form-control" id="nama_fasilitas" name="nama_fasilitas"
                            value="{{ $fasilitas->nama_fasilitas }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="kuantitas" class="form-label">Kuantitas</label>
                        <input type="number" class="form-control" id="kuantitas" name="kuantitas"
                            value="{{ $fasilitas->kuantitas }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Satuan</label>
                        <input type="text" class="form-control" id="harga" value="{{ $fasilitas->harga_satuan }}"
                            name="harga" placeholder="Masukkan Harga Sewa" required oninput="formatCurrency(this)">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $fasilitas->deskripsi }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
