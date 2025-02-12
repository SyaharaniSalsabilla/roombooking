@extends('template.admin.main')

@section('header')

@endsection

@section('content')
<div class="container-fluid">
    <div class="row size-column">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0 card-no-border">
                <h4>Master Harga Ruangan</h4>
                </div>
                <div class="card-body">
                <button class="btn btn-outline-primary-2x" type="button" title="Tambah Data" data-bs-toggle="modal" data-bs-target="#tambahHargaRuangan">Tambah Harga Ruangan</button>
                <div class="table-responsive user-datatable">
                    <table class="display" id="basic-12">
                        <thead>
                            <tr>
                            <th>Nama Ruangan</th>
                            <th>Durasi</th>
                            <th>Harga</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($harga as $sewa)
                            <tr>
                                <td>{{ $sewa->ruangan->nama_ruangan}}</td>
                                <td>{{ $sewa->durasi }}</td>
                                <td>{{ $sewa->harga }}</td>
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
@include('admin.master.hargaRuangan.add')
@endsection

@section('js')
<script>
    function formatCurrency(input) {
        let value = input.value.replace(/[^0-9]/g, '');

        input.value = new Intl.NumberFormat('id-ID').format(value);
    }
</script>
@endsection