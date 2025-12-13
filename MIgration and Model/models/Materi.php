<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $guarded = [
        'materi_id',
        'pertemuan'
    ];

    public function pertemuan()
    {
        return $this->hasOne(Pertemuan::class);
    }
    public function tugas()
    {
        return $this->hasOne(Tugas::class);
    }
}
