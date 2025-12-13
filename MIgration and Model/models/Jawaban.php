<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $guarded = [
        'jawaban_id',
        'mahasiswa',
        'tugas'
    ];

    public function Mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class);
    }

    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }
}
