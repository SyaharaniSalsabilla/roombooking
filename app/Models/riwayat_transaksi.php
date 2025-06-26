<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class riwayattransaksi extends Model
{
    use HasFactory;

    protected $table = 'trx_sewa';

    protected $fillable = [
        'id',
        'kode_transaksi',
        'total',
        'status',
    ];

    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}