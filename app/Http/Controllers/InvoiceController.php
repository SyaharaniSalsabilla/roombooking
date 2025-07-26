<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function download(Request $request, $id)
    {
        // Validasi URL signed
        if (! $request->hasValidSignature()) {
            abort(403, 'Link tidak sah atau sudah kadaluarsa.');
        }

        $pemesanan = Pemesanan::with(['ruangan', 'fasilitas.fs'])->findOrFail($id);

        $pdf = Pdf::loadView('pdf.invoice', [
            'kode_transaksi' => $pemesanan->kode_transaksi,
            'tanggal_awal' => $pemesanan->tgl_mulai,
            'tanggal_akhir' => $pemesanan->tgl_selesai,
            'status' => $pemesanan->status,
            'ruangan' => $pemesanan->ruangan,
            'fasilitas' => $pemesanan->fasilitas,
            'waktu' => $pemesanan->durasi_jam,
            'harga_t' => $pemesanan->total_harga,
            'note' => $pemesanan->catatan
        ]);

        return $pdf->download('invoice_'.$pemesanan->kode_transaksi.'.pdf');
    }
}
