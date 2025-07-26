<div class="modal fade" id="EditPelanggan-{{ $pelanggan->id }}" tabindex="-1" aria-labelledby="EditPelangganLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="pelangganUpdate" action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="EditPelangganLabel">Edit Data Pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{ $pelanggan->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $pelanggan->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" name="telepon" value="{{ $pelanggan->telepon }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" required>{{ $pelanggan->alamat }}</textarea>
                    </div>
                    {{-- Jika perlu ubah password, bisa ditambahkan di sini --}}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
