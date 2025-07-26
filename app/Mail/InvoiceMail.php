<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pemesanan;
    public $downloadLink;

    public function __construct($pemesanan, $downloadLink)
    {
        $this->pemesanan = $pemesanan;
        $this->downloadLink = $downloadLink;
    }

    public function build()
    {
        return $this->view('emails.invoice')
            ->subject('Invoice Pemesanan - Nin Space')
            ->with([
                'kode_transaksi' => $this->pemesanan->kode_transaksi,
                'tanggal_awal' => $this->pemesanan->tgl_mulai,
                'tanggal_akhir' => $this->pemesanan->tgl_selesai,
                'status' => $this->pemesanan->status,
                'ruangan' => $this->pemesanan->ruangan,
                'fasilitas' => $this->pemesanan->fasilitas,
                'waktu' => $this->pemesanan->durasi_jam,
                'harga_t' => $this->pemesanan->total_harga,
                'note' => $this->pemesanan->catatan,
                'downloadLink' => $this->downloadLink
            ]
        );
    }
}
