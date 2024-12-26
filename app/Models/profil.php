<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class profil extends Model
{

    use HasFactory, Notifiable;

    protected $table = 'master_profil_customer';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'id',
        'email',
        'nama',
        'telepon',
        'alamat',
        'password',
        'password_baru',
        'password_lama',
        'created_at',
        'updated_at',

    ];

    public function user(){
        return $this->hasOne(User::class, 'email', 'email');
    }
}
