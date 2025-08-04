<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class RoomHold extends Model
{
    use HasFactory;

    protected $table = 'room_holds';

    protected $fillable = [
        'user_id',
        'ruangan_id',
        'waktu_mulai',
        'waktu_selesai',
        'waktu_kadaluarsa',
    ];

    protected $casts = [
        'waktu_mulai' => 'datetime',
        'waktu_selesai' => 'datetime',
        'waktu_kadaluarsa' => 'datetime',
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke ruangan
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }
    public static function isConflict($ruanganId, $waktuMulai, $waktuSelesai, $waktu_persiapan = 0)
    {
        $waktuMulai = Carbon::parse($waktuMulai)->subMinutes($waktu_persiapan);

        return self::where('ruangan_id', $ruanganId)
            ->where('waktu_kadaluarsa', '>', now())
            ->where(function ($query) use ($waktuMulai, $waktuSelesai) {
                $query->where(function ($q) use ($waktuMulai, $waktuSelesai) {
                    $q->where('waktu_mulai', '<', $waktuSelesai)
                        ->where('waktu_selesai', '>', $waktuMulai);
                });
            })
            ->exists();
    }
}
