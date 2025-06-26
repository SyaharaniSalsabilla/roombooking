@extends('template.front.main')
@section('content')
<div id="app" class="">
    <section id="hiro" class=" mb-6">
        <div class="container flex flex-col justify-center py-8">
            <h2 class="w-full text-center font-primary font-semibold uppercase text-3xl text-primary-5 mb-4">Riwayat Transaksi
            </h2>
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="w-full text-sm text-left text-gray-700 border border-gray-200">
                    <thead class="bg-primary-1 text-primary-5 uppercase text-xs text-center">
                        <tr>
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Ruangan</th>
                            <th class="px-4 py-3">Tanggal Awal</th>
                            <th class="px-4 py-3">Tanggal Akhir</th>
                            <th class="px-4 py-3">Nominal</th>
                            <th class="px-4 py-3">Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($riwayatTransaksi as $index => $transaksi)
                            <tr class="border-t border-gray-200 hover:bg-gray-100 text-center">
                                <td class="px-4 py-3">{{ $index + 1 }}</td>
                                <td class="px-4 py-3">{{ $transaksi->ruangan->nama_ruangan ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $transaksi->tanggal_awal ?? $transaksi->tanggal_awal->format('d M Y') }}</td>
                                <td class="px-4 py-3">{{ $transaksi->tanggal_akhir ?? $transaksi->tanggal_akhir->format('d M Y') }}</td>
                                <td class="px-4 py-3">{{ $transaksi->mst_harga_sewa_id }}</td>
                                <td class="px-4 py-3">{{ $transaksi->deskripsi }}</td>
                            </tr>
                        <!-- @if(count($transaksi->sewaFasilitas) > 0)
                            <tr>
                                <td colspan="7">
                                    <table border="1" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($transaksi->sewaFasilitas as $fas)
                                                    <tr>
                                                        <td>{{$fas->fs->nama_fasilitas ?? '-'}}</td>
                                                        <td>{{$fas->kuantitas }}</td>
                                                    </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        @endif -->
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-gray-500">Tidak ada riwayat transaksi.</td>
                            </tr>
                        @endforelse
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
