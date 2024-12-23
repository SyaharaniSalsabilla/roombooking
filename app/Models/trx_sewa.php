<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class trx_sewa extends Model
{

    use HasFactory, Notifiable;

    protected $table = 'trx_sewa';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'id',
        'mst_ruangan_id',
        'harga_sewa_id',
        'profil_id',
        'tanggal_awal',
        'tangga_akhir',
        'keperluan',
        'diskon',
        'deskripsi',
    ];

    public function ruangan(){
        return $this->belongsTo(\App\Models\Ruangan::class, 'mst_ruangan_id');
    }
}
