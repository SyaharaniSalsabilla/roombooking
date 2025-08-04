@extends('template.admin.main')

@section('header')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row size-column">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <h4>Fasilitas Tambahan</h4>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-outline-primary-2x" type="button" title="Tambah Data" data-bs-toggle="modal"
                            data-bs-target="#tambahFasilitas">Tambah Fasilitas</button>
                        <div class="table-responsive user-datatable">
                            <table class="display" id="basic-12">
                                <thead>
                                    <tr>
                                        <th>Nama Faslitas</th>
                                        <th>Kuantitas</th>
                                        <th>Deskripsi</th>
                                        <th>Harga Satuan</th>
                                        <th>Waktu Produksi (menit/pcs)</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fasilitas as $fas)
                                        <tr>
                                            <td>{{ $fas->nama_fasilitas }}</td>
                                            <td>{{ $fas->kuantitas }}</td>
                                            <td>{{ $fas->deskripsi }}</td>
                                            <td>{{ $fas->harga_satuan }}</td>
                                            <td>{{ $fas->waktu_produksi }}</td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit">
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#EditFasilitas-{{ $fas->id }}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </li>
                                                    <li class="delete">
                                                        <form action="{{ route('admin.fasilitasDelete', $fas->id) }}"
                                                            method="POST" style="display:inline;"
                                                            onsubmit="return confirm('Yakin ingin menghapus fasilitas ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                style="background:none; border:none; color:red; cursor:pointer;padding:0px;">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </li>
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
    @include('admin.master.fasilitas.add')

    @foreach ($fasilitas as $fas)
        @include('admin.master.fasilitas.edit', ['fasilitas' => $fas])
    @endforeach
@endsection

@section('js')
    <script>
        // $(document).ready(function () {
        //     $('#basic-12').DataTable({
        //         pageLength: 20,          // tampilkan 20 baris
        //         lengthChange: false,     // hilangkan dropdown jumlah baris
        //     });
        // });

        function formatCurrency(input) {
            let value = input.value.replace(/[^0-9]/g, '');

            input.value = new Intl.NumberFormat('id-ID').format(value);
        }
    </script>
@endsection
