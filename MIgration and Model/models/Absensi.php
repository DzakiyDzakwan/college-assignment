<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
    use HasFactory;

    protected $guarded = [
        'absensi_id',
        'mahasiswa_id',
        'pertemuan',
        'waktu_absensi'
    ];

    public function user()
    {
        return $this->belongsTo(pertemuan::class);
    }
    
}
