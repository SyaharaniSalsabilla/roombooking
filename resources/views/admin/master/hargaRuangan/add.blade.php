<div class="modal fade" id="tambahHargaRuangan" tabindex="-1" aria-labelledby="tambahHargaRuanganLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahHargaRuanganLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form atau Konten Modal -->
                <form id="tambahHargaRuanganAdd" action="{{ route('admin.ruanganHargaAdd') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="ruangan" class="form-label">Nama Ruangan</label>
                        <select class="form-control" id="ruangan" name="ruangan" required>
                            <option value="">Pilih Ruangan</option>
                            @foreach ($ruangan as $room)
                                <option value="{{ $room->id }}">{{ $room->nama_ruangan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="durasi" class="form-label">Durasi</label>
                        <input type="number" class="form-control" id="durasi" name="durasi"  placeholder="Masukkan Durasi / jam"  required>
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" form="ruanganAdd">Simpan</button>
            </div>
        </div>
    </div>
</div>