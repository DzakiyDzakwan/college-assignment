<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function materi()
    {
        return $this->hasOne(Materi::class);
    }

    public function tugas() 
    {
        return $this->hasOne(Tugas::class);
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
}
