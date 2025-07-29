<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstHargaSewa extends Model
{
    use HasFactory;

    protected $table = 'mst_harga_sewa'; // jika nama tabel tidak jamak

    protected $fillable = [
        'ruangan_id',
        'durasi',
        'harga',
    ];

    // Relasi ke tabel ruangan (jika ada modelnya)
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }
}