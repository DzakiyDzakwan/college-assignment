<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $guarded = [
        'tugas_id',
        'materi'
    ];

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }
    public function  materi()
    {
        return $this->hasOne(Materi::class);
    }
}
