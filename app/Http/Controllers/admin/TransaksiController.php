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
use Illuminate\Support\Facades\DB;

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
        // $transaksi = sewa_fasilitas::with('fasilitas')->get();
        $ruangan = Ruangan::all();
        $harga = harga_sewa::all();
        $orderIds = trx_sewa::pluck('order_id')->unique();
        $orders = DB::table('orders')->whereIn('id', $orderIds)->pluck('ordered_by', 'id');
        
        $transaksi = trx_sewa::with(['ruangan','sewaFasilitas','sewaFasilitas.fasilitas'])->get()
        // Ambil data orders tanpa model
        ->map(function ($trx) use ($orders) {
            $trx->ordered_by = $orders[$trx->order_id] ?? null;
            return $trx;
        });
        
        // dd($transaksi[0]->totalFas(30)[0]->fasilitas);
        // dd($transaksi[0]->sewaFasilitas[0]->fs);
        return view('admin.transaction.fasilitas.index', compact(['ruangan', 'harga','fasilitas', 'profil', 'sewa', 'transaksi']));
    }
}
