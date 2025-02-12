<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\fasilitas;
use App\Models\profil;
use App\Models\harga_sewa;
use App\Models\trx_sewa;
use App\Models\sewa_fasilitas;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class TransaksiController extends Controller
{
    public function indexRuangan()
    {
        $ruangan = Ruangan::all();
        $harga = harga_sewa::all();
        $profil = profil::all();
        $transaksi = trx_sewa::all();

        return view('admin.transaction.ruangan.index', compact(['ruangan', 'harga', 'profil', 'transaksi']));
    }

    public function indexFasilitas()
    {
        $fasilitas = fasilitas::all();
        $profil = profil::all();
        $sewa = trx_sewa::all();
        $transaksi = sewa_fasilitas::all();

        return view('admin.transaction.fasilitas.index', compact(['fasilitas', 'profil', 'sewa', 'transaksi']));
    }
}
