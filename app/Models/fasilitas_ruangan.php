<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class fasilitas_ruangan extends Model
{

    use HasFactory, Notifiable;

    protected $table = 'fasilitas_ruangan';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'id',
        'ruangan_id',
        'fasilitas_id',
        'is_active',
    ];

    public function itemName(){
        return $this->belongsTo(\App\Models\fasilitas::class,'fasilitas_id');
    }
}
