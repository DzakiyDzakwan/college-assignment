<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    use HasFactory;

    protected $guarded = [
        'pertemuan_id',
        'kelas'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function materi()
    {
        return $this->hasOne(Materi::class);
    }
    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
}
