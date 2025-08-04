<div class="modal fade" id="tambahFasilitas" tabindex="-1" aria-labelledby="tambahFasilitasLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahFasilitasLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="fasilitasAdd" action="{{ route('admin.fasilitasAdd') }}" method="POST"
                enctype="multipart/form-data">

                <div class="modal-body">
                    <!-- Form atau Konten Modal -->
                    @csrf
                    <div class="mb-3">
                        <label for="nama_fasilitas" class="form-label">Nama Fasilitas</label>
                        <input type="text" class="form-control" id="nama_fasilitas" name="nama_fasilitas" required>
                    </div>
                    <div class="mb-3">
                        <label for="kuantitas" class="form-label">Kuantitas</label>
                        <input type="number" class="form-control" id="kuantitas" name="kuantitas" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Satuan</label>
                        <input type="text" class="form-control" id="harga" name="harga"
                            placeholder="Masukkan Harga Sewa" required oninput="formatCurrency(this)">
                    </div>
                    <div class="mb-3">
                        <label for="waktu_produksi" class="form-label">Waktu Produksi (mnt/pcs)</label>
                        <input type="number" class="form-control" id="waktu_produksi" name="waktu_produksi"
                            placeholder="Masukkan Waktu Produksi dalam menit per pcs" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
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
