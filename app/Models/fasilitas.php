<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
<<<<<<< HEAD

=======
>>>>>>> b7be7ecf98961a36d10fa3d27a4ac9d5d52ef462

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
