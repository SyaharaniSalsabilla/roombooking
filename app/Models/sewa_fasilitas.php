<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sewa_fasilitas extends Model
{

    use HasFactory, Notifiable;

    protected $table = 'sewa_fasilitas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'id',
        'trx_sewa_id',
        'fasilitas_id',
        'kuantitas',
        'satuan',
    ];
}
