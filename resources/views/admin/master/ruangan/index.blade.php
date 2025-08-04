@extends('template.admin.main')

@section('header')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row size-column">
            <div class="col-sm-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <h4>Ruangan</h4>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-outline-primary-2x" type="button" title="Tambah Data" data-bs-toggle="modal"
                            data-bs-target="#tambahRuangan">Tambah Ruangan</button>
                        <div class="table-responsive user-datatable">
                            <table class="display" id="basic-12">
                                <thead>
                                    <tr>
                                        <th>Nama Ruangan</th>
                                        <th>Kapasitas</th>
                                        <th>Lokasi</th>
                                        <th>Panjang</th>
                                        <th>Lebar</th>
                                        <th>Harga</th>
                                        <th>Diskon</th>
                                        <th>Waktu Persiapan (menit)</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ruangans as $ruangan)
                                        <tr>
                                            <td>{{ $ruangan->nama_ruangan }}</td>
                                            <td>{{ $ruangan->kapasitas }}</td>
                                            <td>{{ $ruangan->lokasi }}</td>
                                            <td>{{ $ruangan->panjang_ruangan }}</td>
                                            <td>{{ $ruangan->lebar_ruangan }}</td>
                                            <td>{{ $ruangan->harga }}</td>
                                            <td>
                                                @if ($ruangan->diskon > 0)
                                                    {{ $ruangan->diskon }}%
                                                @else
                                                    Tidak ada diskon
                                                @endif
                                            </td>
                                            <td>{{ $ruangan->waktu_produksi }}</td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit">
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#editRuangan{{ $ruangan->id }}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </li>
                                                    <li class="delete">
                                                        <form action="{{ route('admin.ruanganDelete', $ruangan->id) }}"
                                                            method="POST" style="display:inline;"
                                                            onsubmit="return confirm('Yakin ingin menghapus ruangan ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                style="background:none; border:none; color:red; cursor:pointer;padding:0px;">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <!-- <li class="delete">
                                                <button type="button" class="btn-delete text-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalDeleteRuangan"
                                                    data-id="{{ $ruangan->id }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </li> -->
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                <tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($ruangans as $ruangan)
        @include('admin.master.ruangan.edit', ['ruangan' => $ruangan])
    @endforeach
    @include('admin.master.ruangan.add')
    <div class="modal fade" id="modalDeleteRuangan" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="formDeleteRuangan" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDeleteLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <p>Yakin ingin menghapus ruangan ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<!-- Modal Hapus Ruangan -->



@section('js')
    <script>
        function formatCurrency(input) {
            let value = input.value.replace(/[^0-9]/g, '');

            input.value = new Intl.NumberFormat('id-ID').format(value);
        }

        function previewImage(event) {
            const imagePreview = document.getElementById('productImagePreview');
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
            } else {
                imagePreview.src = '#';
                imagePreview.style.display = 'none';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const modalDelete = document.getElementById('modalDeleteRuangan');
            const formDelete = document.getElementById('formDeleteRuangan');

            modalDelete.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-id');
                const url = `{{ url('admin/ruangan') }}/${id}`;

                formDelete.setAttribute('action', url);
            });
        });
    </script>
@endsection
