<div class="modal fade" id="editRuangan{{ $ruangan->id }}" tabindex="-1" aria-labelledby="editRuanganLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRuanganLabel">Edit Data Ruangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <form id="ruanganEdit{{ $ruangan->id }}" action="{{ route('admin.ruanganUpdate', $ruangan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
                        <input type="text" class="form-control" name="nama_ruangan" value="{{ $ruangan->nama_ruangan }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="kapasitas" class="form-label">Maksimal Kapasitas</label>
                        <input type="number" class="form-control" name="kapasitas" value="{{ $ruangan->kapasitas }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="text" class="form-control" name="lokasi" value="{{ $ruangan->lokasi }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="panjang" class="form-label">Panjang (M)</label>
                        <input type="number" class="form-control" name="panjang" value="{{ $ruangan->panjang_ruangan }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="lebar" class="form-label">Lebar (M)</label>
                        <input type="number" class="form-control" name="lebar" value="{{ $ruangan->lebar_ruangan }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="gambar_ruangan" class="form-label">Gambar</label>
                        <input type="file" class="form-control" name="gambar_ruangan" accept="image/*" onchange="previewImageEdit(event, {{ $ruangan->id }})">
                        <div class="mt-3">
                            @if ($ruangan->image)
                                <img id="productImagePreview{{ $ruangan->id }}" src="{{ asset('assets/front/image/' . $ruangan->image) }}" alt="Preview" style="max-width: 200px;">
                            @else
                                <img id="productImagePreview{{ $ruangan->id }}" src="#" alt="Preview" style="max-width: 200px; display: none;">
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Sewa</label>
                        <input type="text" class="form-control" name="harga" value="{{ number_format($ruangan->harga, 0, ',', '.') }}" oninput="formatCurrency(this)" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" rows="3" required>{{ $ruangan->deskripsi }}</textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" form="ruanganEdit{{ $ruangan->id }}">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>

@section('js')
<script>
    function formatCurrency(input) {
        let value = input.value.replace(/[^0-9]/g, '');
        input.value = new Intl.NumberFormat('id-ID').format(value);
    }

    function previewImageEdit(event, id) {
        const imagePreview = document.getElementById('productImagePreview' + id);
        const file = event.target.files[0];

        if (file) {
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran file gambar tidak boleh lebih dari 2MB');
                event.target.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
