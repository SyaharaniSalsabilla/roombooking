<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\fasilitas_ruangan;

class Ruangan extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'mst_ruangan';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'nama_ruangan',
        'kapasitas',
        'lokasi',
        'panjang_ruangan',
        'lebar_ruangan',
        'deskripsi',
        'image',
        'harga',
        'diskon',
        'active'
    ];

    public function booked(){
        return $this->hasMany(\App\Models\trx_sewa::class, 'mst_ruangan_id');
    }

     public function cn_fasilitas(){
        return $this->belongsToMany(Fasilitas::class, 'fasilitas_ruangan', 'ruangan_id', 'fasilitas_id');
        return $data;
    }
}
