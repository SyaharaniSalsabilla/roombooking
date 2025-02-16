@extends('template.admin.main')

@section('header')

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
                            <th>Nama Ruangan</th>
                            <th>Durasi</th>
                            <th>Nama Penyewa</th>
                            <th>Tanggal Awal</th>
                            <th>Tanggal Akhir</th>
                            <th>Catatan</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaksi as $trx)
                            @php
                                $tanggalAwal = Carbon::parse($trx->tanggal_awal);
                                $tanggalAkhir = Carbon::parse($trx->tanggal_akhir);

                                $selisihJam = $tanggalAwal->diffInHours($tanggalAkhir);
                            @endphp
                            <tr>
                                <td>{{ $trx->ruangan->nama_ruangan}}</td>
                                <td>{{ round($selisihJam,2) }} Jam</td>
                                <td>{{ $trx->profile->nama ?? '' }}</td>
                                <td>{{ $trx->tanggal_awal }}</td>
                                <td>{{ $trx->tanggal_akhir }}</td>
                                <td>{{ $trx->catatan }}</td>
                                <td> 
                                    <ul class="action"> 
                                    <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                    <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
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
            reader.onload = function (e) {
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