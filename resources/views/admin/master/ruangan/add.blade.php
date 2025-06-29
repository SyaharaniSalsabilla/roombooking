<div class="modal fade" id="tambahRuangan" tabindex="-1" aria-labelledby="tambahRuanganLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahRuanganLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form atau Konten Modal -->
                <form id="ruanganAdd" action="{{ route('admin.ruanganAdd') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
                        <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" required>
                    </div>
                    <div class="mb-3">
                        <label for="kapasitas" class="form-label">Maksimal Kapasitas</label>
                        <input type="number" class="form-control" id="kapasitas" name="kapasitas" required>
                    </div>
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                    </div>
                    <div class="mb-3">
                        <label for="panjang" class="form-label">Panjang (M)</label>
                        <input type="number" class="form-control" id="panjang" name="panjang" required>
                    </div>
                    <div class="mb-3">
                        <label for="lebar" class="form-label">Lebar (M)</label>
                        <input type="number" class="form-control" id="lebar" name="lebar" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar_ruangan" class="form-label">Gambar</label>
                        <input
                            type="file"
                            class="form-control"
                            id="gambar_ruangan"
                            name="gambar_ruangan"
                            accept="image/*"
                            onchange="previewImage(event)">
                        <div class="mt-3">
                            <img id="productImagePreview" src="#" alt="Image Preview" style="max-width: 200px; display: none;">
                            <p id="productImageError" style="display: none;">Ukuran file gambar tidak boleh lebih dari 2MB</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Sewa</label>
                        <input
                            type="text"
                            class="form-control"
                            id="harga"
                            name="harga"
                            placeholder="Masukkan Harga Sewa"
                            required
                            oninput="formatCurrency(this)">
                    </div>
                    <div class="mb-3">
                        <label for="diskon" class="form-label">Diskon (%)</label>
                        <input type="number" class="form-control" id="diskon" name="diskon" min="0" max="100">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" form="ruanganAdd">Simpan</button>
            </div>
        </div>
    </div>
</div>
