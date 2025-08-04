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
use Illuminate\Support\Facades\Mail;
// use Barryvdh\DomPDF\Facade\Pdf;
use PDF;

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


        // $transaksi = trx_sewa::with(['ruangan','sewaFasilitas','sewaFasilitas.fasilitas'])->get()
        // Ambil data orders tanpa model
        // ->map(function ($trx) use ($orders) {
        //     $trx->ordered_by = $orders[$trx->order_id] ?? null;
        //     return $trx;
        // });

        $transaksi = trx_sewa::with(['ruangan', 'sewaFasilitas', 'sewaFasilitas.fasilitas', 'user'])->get();

        $transaksi = $transaksi->groupBy('kode_transaksi')->map(function ($items, $kode) {
            $last = $items->last();

            // Gabung semua nama ruangan yang unik
            $nama_ruangan = $items->pluck('ruangan.nama_ruangan')->unique()->implode(', ');

            // Gabungkan ke dalam satu objek saja
            $last->gabungan_nama_ruangan = $nama_ruangan;

            return $last;
        });

        // dd($transaksi[0]->totalFas(30)[0]->fasilitas);
        // dd($transaksi[0]->sewaFasilitas[0]->fs);
        return view('admin.transaction.fasilitas.index', compact(['ruangan', 'harga', 'fasilitas', 'profil', 'sewa', 'transaksi']));
    }
    public function statusFasilitas($kode, $status)
    {
        if ($status == 4) {
            $this->sendInvoice($kode);
            return redirect()->back()->with('success', 'Status fasilitas berhasil diperbarui dan invoice telah dikirim.');
        }
        $updated = trx_sewa::where('kode_transaksi', $kode)->update(['status' => $status]);

        return redirect()->back()->with('success', 'Status fasilitas berhasil diperbarui.');
    }
    protected function sendInvoice($kode)
    {

        $transaksi = trx_sewa::where('kode_transaksi', $kode)->with(['ruangan', 'sewaFasilitas', 'sewaFasilitas.fasilitas', 'user'])->get();

        $ruangan = [];
        $fasilitas = null;
        $email = '';
        $harga_total = 0;
        $note = '';
        $tanggal_awal = '';
        $tanggal_akhir = '';
        $status = '';
        $waktu = 0;
        foreach ($transaksi as $trx) {
            $ruangan[] = Ruangan::where('id', $trx->mst_ruangan_id)->first();
            $fasilitas = sewa_fasilitas::where('trx_sewa_id', $trx->id)->get();
            $email = $trx->user->email;
            $harga_total = $trx->mst_harga_sewa_id;
            $note = $trx->keperluan;
            $tanggal_awal = $trx->tanggal_awal;
            $tanggal_akhir = $trx->tanggal_akhir;
            $nama = $trx->user->profile->nama ?? 'Tidak ada nama';
            $telepon = $trx->user->profile->telepon ?? 'Tidak ada telepon';
            if ($trx->status == 0) {
                $status = 'Menunggu pembayaran';
            } else if ($trx->status == 1) {
                $status = 'Pembayaran diterima';
            } else if ($trx->status == 2) {
                $status = 'Selesai';
            } else if ($trx->status == 3) {
                $status = 'Dibatalkan';
            }
            $tanggalAwal = \Carbon\Carbon::parse($trx->tanggal_awal);
            $tanggalAkhir = \Carbon\Carbon::parse($trx->tanggal_akhir);
            $waktu = ceil($tanggalAwal->diffInHours($tanggalAkhir));
        }

        $data = [
            'kode_transaksi' => $kode,
            'ruangan' => $ruangan,
            'fasilitas' => $fasilitas,
            'email' => $email,
            'harga_t' => $harga_total,
            'note' => $note,
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir,
            'status' => $status,
            'waktu' => $waktu,
            'nama' => $nama,
            'telepon' => $telepon,
        ];
        $pdf = Pdf::loadView('admin.transaction.newInvoice', $data); // generate PDF dari view

        Mail::send('admin.transaction.newInvoice', $data, function ($message) use ($email, $pdf, $nama, $kode) {
            $message->to($email)
                ->subject('Invoice - NinSpace')
                ->attachData($pdf->output(), 'invoice-' . trim($nama) . '-' . trim($kode) . '.pdf', [
                    'mime' => 'application/pdf',
                ]);
        });

        return 'Invoice berhasil dikirim ke email Anda.';
    }
}
