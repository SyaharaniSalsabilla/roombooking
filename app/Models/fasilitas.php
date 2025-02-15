<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class fasilitas extends Model
{

    use HasFactory, Notifiable;

    protected $table = 'mst_fasilitas';
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
