<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = [
        'kelas_id',
        'dosen',
        'mata_kuliah'
    ];

    public function enrollment()
    {
        return $this->belongsToMany(Enrollment::class);
    }
    public function dosen()
    {
        return $this->belongsToMany(Dosen::class);
    }
    public function mata_kuliah()
    {
        return $this->belongsToMany(Mata_kuliah::class);
    }
    public function pertemuan()
    {
        return $this->hasMany(Pertemuan::class);
    }
}
