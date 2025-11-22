<?php
// app/Models/Jurnal.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tanggal',
        'mata_pelajaran',
        'materi_pelajaran',
        'kehadiran_siswa',
        'catatan_khusus',
        'status'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'kehadiran_siswa' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}