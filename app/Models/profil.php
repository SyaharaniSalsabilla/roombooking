<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profil extends Model
{

    use HasFactory, Notifiable;

    protected $table = 'profil';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'id',
        'nama',
        'alamat',
        'email',
        'telepon',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'email');
    }
}
