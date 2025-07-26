@extends('template.admin.main')

@section('header')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row size-column">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <h4>Pelanggan</h4>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-outline-primary-2x" type="button" title="Tambah Data"
                            data-bs-toggle="modal" data-bs-target="#tambahPelanggan">Tambah Pelanggan</button>

                        <div class="table-responsive user-datatable">
                            <table class="display" id="basic-12">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Alamat</th>
                                        <th>Kata Sandi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pelanggans as $pelanggan)
                                        <tr>
                                            <td>{{ $pelanggan->nama }}</td>
                                            <td>{{ $pelanggan->email }}</td>
                                            <td>{{ $pelanggan->telepon }}</td>
                                            <td>{{ $pelanggan->alamat }}</td>
                                            <td>********</td> {{-- password disembunyikan --}}
                                            <td>
                                                <ul class="action">
                                                    <li class="edit">
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#EditPelanggan-{{ $pelanggan->id }}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </li>
                                                    <li class="delete">
                                                        <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}"
                                                            method="POST" style="display:inline;"
                                                            onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?')">
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Tambah --}}
    @include('admin.master.pelanggan.add')

    {{-- Modal Edit --}}
    @foreach ($pelanggans as $pelanggan)
        @include('admin.master.pelanggan.edit', ['pelanggan' => $pelanggan])
    @endforeach
@endsection

@section('js')
    <script>
        function formatCurrency(input) {
            let value = input.value.replace(/[^0-9]/g, '');
            input.value = new Intl.NumberFormat('id-ID').format(value);
        }
    </script>
@endsection
