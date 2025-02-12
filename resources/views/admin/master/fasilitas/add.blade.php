<div class="modal fade" id="tambahFasilitas" tabindex="-1" aria-labelledby="tambahFasilitasLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahFasilitasLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form atau Konten Modal -->
                <form id="fasilitasAdd" action="{{ route('admin.fasilitasAdd') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="gambar_fasilitas" class="form-label">Gambar</label>
                        <input 
                            type="file" 
                            class="form-control" 
                            id="gambar_fasilitas" 
                            name="gambar_fasilitas" 
                            accept="image/*" 
                            onchange="previewImage(event)">
                        <div class="mt-3">
                            <img id="productImagePreview" src="#" alt="Image Preview" style="max-width: 200px; display: none;">
                            <p id="productImageError" style="display: none;">Ukuran file gambar tidak boleh lebih dari 2MB</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Satuan</label>
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