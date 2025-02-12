<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class harga_sewa extends Model
{

    use HasFactory, Notifiable;

    protected $table = 'mst_harga_sewa';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'id',
        'ruangan_id',
        'durasi',
        'harga',
    ];
}
