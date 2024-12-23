<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fasilitas extends Model
{

    use HasFactory, Notifiable;

    protected $table = 'fasilitas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'id',
        'nama_fasilitas',
        'kuantitas',
        'deskripsi',
        'harga_satuan',
        'image',
    ];
}
