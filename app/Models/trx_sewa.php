<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\fasilitas;

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
        'mst_harga_sewa_id',
        'mst_profil_id',
        'tanggal_awal',
        'tanggal_akhir',
        'keperluan',
        'diskon',
        'deskripsi',
        'kode_transaksi',
        'status',
    ];

    public function ruangan(){
        return $this->belongsTo(\App\Models\Ruangan::class, 'mst_ruangan_id');
    }

    public function profile(){
        return $this->belongsTo(\App\Models\profil::class, 'mst_profil_id');
    }

    public function user(){
        return $this->belongsTo(\App\Models\User::class, 'mst_profil_id');
    }

    public function sewaFasilitas(){
        return $this->hasMany(sewa_fasilitas::class, 'trx_sewa_id');
    }

    public function totalFas($id){
        return sewa_fasilitas::where('trx_sewa_id',$id)->get();
    }
}
