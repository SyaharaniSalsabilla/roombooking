<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\trx_sewa;
use Illuminate\Notifications\Notifiable;

class sewa_fasilitas extends Model
{

    use HasFactory, Notifiable;

    protected $table = 'trx_sewa_fasilitas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'id',
        'trx_sewa_id',
        'mst_fasilitas_id',
        'kuantitas',
        'satuan',
    ];


    public function sewa(){
        return $this->belongsTo(trx_sewa::class);
    }
}
