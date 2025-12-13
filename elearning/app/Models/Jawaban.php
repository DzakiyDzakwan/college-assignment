<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    public $timestamp = true;

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }
}
