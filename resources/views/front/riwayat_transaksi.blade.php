@extends('template.front.main')
@section('content')
<div id="app" class="">
    <section id="hiro" class=" mb-6">
        <div class="container flex flex-col justify-center py-8">
            <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">Riwayat Transaksi
            </h2>
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="w-full text-sm text-left text-gray-700 border border-gray-200 divide-y-2 divide-primary-5 rounded-lg">
                    <thead class="bg-primary-1 text-primary-5 uppercase text-xs text-center rounded-lg">
                        <tr>
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Kode Transaksi</th>
                            <th class="px-4 py-3">Nama Ruangan</th>
                            <th class="px-4 py-3">Fasilitas</th>
                            <th class="px-4 py-3">Durasi</th>
                            <!-- <th class="px-4 py-3">Nama Penyewa</th> -->
                            <th class="px-4 py-3">Tanggal Awal</th>
                            <th class="px-4 py-3">Tanggal Akhir</th>
                            <th class="px-4 py-3">Catatan</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="flex-col divide-y-2 divide-primary-5 rounded-lg">
                        @foreach ($transaksi as $trx)
                            @php
                                $tanggalAwal = \Carbon\Carbon::parse($trx->tanggal_awal);
                                $tanggalAkhir = \Carbon\Carbon::parse($trx->tanggal_akhir);
                                $selisihJam = $tanggalAwal->diffInHours($tanggalAkhir);
                            @endphp
                            <tr >
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">{{ $trx->kode_transaksi }}</td>
                                <td class="px-4 py-3">{{ $trx->gabungan_nama_ruangan }}</td>
                                <td class="px-4 py-3">
                                    @if (count($trx->sewaFasilitas) > 0)
                                        @foreach ($trx->sewaFasilitas as $fas)
                                            {{ $fas->fs->nama_fasilitas ? $fas->fs->nama_fasilitas . '(' . $fas->kuantitas . ')' : '-' }}<br>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                <td class="px-4 py-3">{{ round($selisihJam, 2) }} Jam</td>
                                <!-- <td class="px-4 py-3">{{ $trx->user->profile->nama ?? '-' }}</td> -->
                                <td class="px-4 py-3">{{ $trx->tanggal_awal }}</td>
                                <td class="px-4 py-3">{{ $trx->tanggal_akhir }}</td>
                                <td class="px-4 py-3">{{ $trx->keperluan }}</td>
                                <td class="px-4 py-3">
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
                                <td class="px-4 py-3">
                                    <ul class="action d-flex gap-2 flex-wrap">
                                        <!-- {{-- Tombol kirim invoice --}}
                                        <li>
                                            <a href="{{ route('riwayat.transaksi.status', [$trx->kode_transaksi, 4]) }}">
                                                <i class="fa-solid fa-envelope"></i> Kirim Invoice
                                            </a>
                                        </li> -->
                                        {{-- Tombol download invoice --}}
                                        <li>
                                            <a href="{{ route('invoice.pdf', $trx->kode_transaksi) }}" target="_blank">
                                                <i class="fa-solid fa-file-pdf"></i> Download Invoice
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
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
@section('script')
<script>     
document.addEventListener('DOMContentLoaded', function(){
    document.getElementsByClassName('password_baru').value = ''
});

document.addEventListener('DOMContentLoaded', function () {
    const btn = document.getElementById('profileDropdownBtn');
    const menu = document.getElementById('profileDropdown');

    if (btn && menu) {
        btn.addEventListener('click', function (e) {
            e.stopPropagation();
            menu.classList.toggle('hidden');
        });

        document.addEventListener('click', function () {
            menu.classList.add('hidden');
        });
    }
});
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const btn = document.getElementById('profileDropdownBtn');
        const menu = document.getElementById('profileDropdown');

        btn.addEventListener('click', function () {
            menu.classList.toggle('hidden');
        });

        // Optional: Klik di luar untuk menutup
        document.addEventListener('click', function (e) {
            if (!btn.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    });
</script>
@endsection
