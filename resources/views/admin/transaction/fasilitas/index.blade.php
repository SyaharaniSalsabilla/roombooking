@extends('template.admin.main')


@section('header')

@section('style')
    <style>

    </style>
@endsection

@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <div class="container-fluid">
        <div class="row size-column">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <h4>Sewa Ruangan</h4>
                    </div>
                    <div class="card-body">
                        <!-- <button class="btn btn-outline-primary-2x" type="button" title="Tambah Data" data-bs-toggle="modal" data-bs-target="#tambahFasilitas">Tambah Fasilitas</button> -->
                        <div class="table-responsive user-datatable">
                            <table class="display" id="basic-12">
                                <thead>
                                    <tr>
                                        <th>Kode Transaksi</th>
                                        <th>Nama Ruangan</th>
                                        <th>Fasilitas</th>
                                        <th>Durasi</th>
                                        <th>Nama Penyewa</th>
                                        <th>Tanggal Awal</th>
                                        <th>Tanggal Akhir</th>
                                        <th>Catatan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- php
                                            $grouped = $transaksi->groupBy('ordered_by');

                                        endphp -->

                                    <!-- foreach($grouped as $orderedBy => $group)
                                        @php $no=0; @endphp -->
                                    @foreach ($transaksi as $trx)
                                        @php
                                            $no++;
                                            $tanggalAwal = \Carbon\Carbon::parse($trx->tanggal_awal);
                                            $tanggalAkhir = \Carbon\Carbon::parse($trx->tanggal_akhir);
                                            $selisihJam = $tanggalAwal->diffInHours($tanggalAkhir);

                                        @endphp
                                        <tr>
                                            <td>{{ $trx->kode_transaksi }}</td>
                                            <td>{{ $trx->gabungan_nama_ruangan }}</td>
                                            <td>
                                                @if (count($trx->sewaFasilitas) > 0)
                                                    @foreach ($trx->sewaFasilitas as $fas)
                                                        {{ $fas->fs->nama_fasilitas ? $fas->fs->nama_fasilitas . '(' . $fas->kuantitas . ')' : '-' }}<br>
                                                    @endforeach
                                                @else
                                                    -
                                                @endif
                                            <td>{{ round($selisihJam, 2) }} Jam</td>
                                            <td>{{ $trx->user->profile->nama ?? '-' }}</td>
                                            <td>{{ $trx->tanggal_awal }}</td>
                                            <td>{{ $trx->tanggal_akhir }}</td>
                                            <td>{{ $trx->keperluan }}</td>
                                            <td>
                                                @if ($trx->status == 0)
                                                    <span class="badge bg-warning">Menunggu Pembayaran</span>
                                                @elseif ($trx->status == 1)
                                                    <span class="badge bg-success">Pembayaran Diterima</span>
                                                @elseif ($trx->status == 2)
                                                    <span class="badge bg-info">Selesai</span>
                                                @else
                                                    <span class="badge bg-danger">Dibatalkan</span>
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="action d-flex gap-2 flex-wrap">

                                                    {{-- Tombol status berdasarkan kondisi --}}
                                                    @if ($trx->status == 0)
                                                        <li>
                                                            <a
                                                                href="{{ route('admin.transaksiFasilitas.status', [$trx->kode_transaksi, 3]) }}">
                                                                <i class="fa-solid fa-ban"></i> Batalkan
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ route('admin.transaksiFasilitas.status', [$trx->kode_transaksi, 1]) }}">
                                                                <i class="fa-solid fa-money-bill"></i> Tandai Sudah Dibayar
                                                            </a>
                                                        </li>
                                                    @elseif ($trx->status == 1)
                                                        <li>
                                                            <a
                                                                href="{{ route('admin.transaksiFasilitas.status', [$trx->kode_transaksi, 2]) }}">
                                                                <i class="fa-solid fa-check-circle"></i> Selesaikan
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ route('admin.transaksiFasilitas.status', [$trx->kode_transaksi, 3]) }}">
                                                                <i class="fa-solid fa-ban"></i> Batalkan
                                                            </a>
                                                        </li>
                                                    @endif

                                                    {{-- Tombol kirim invoice --}}
                                                    <li>
                                                        <a
                                                            href="{{ route('admin.transaksiFasilitas.status', [$trx->kode_transaksi, 4]) }}">
                                                            <i class="fa-solid fa-envelope"></i> Kirim Invoice
                                                        </a>
                                                    </li>

                                                </ul>
                                            </td>

                                        </tr>
                                        {{--
                                        @if (count($trx->sewaFasilitas) > 0)
                                            <tr>
                                                <td></td>
                                                <td colspan="9">
                                                    <table border="1" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th style="min-width:150px !important;" class="text-start">
                                                                    Nama Fasilitas</th>
                                                                <th>Jumlah</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($trx->sewaFasilitas as $fas)
                                                                <tr>
                                                                    <td style="min-width:150px !important;"
                                                                        class="text-start">
                                                                        {{ $fas->fs->nama_fasilitas ?? '-' }}</td>
                                                                    <td>{{ $fas->kuantitas }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        @endif --}}
                                    @endforeach
                                    <!-- <tr>
                                            <td colspan="8" class="bg-primary text-white p-1"></td>
                                        </tr> -->
                                    <!-- endforeach -->
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.master.fasilitas.add')
@endsection

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
    </script>
@endsection
