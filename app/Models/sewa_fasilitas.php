<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\fasilitas;

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

    public function fasilitas(){
        return $this->hasMany(fasilitas::class, 'id', 'mst_fasilitas_id');
    }

    public function totalFas($id){
        $count = $this::where('trx_sewa_id',$id)->get();
        return $count->count();
    }
}
