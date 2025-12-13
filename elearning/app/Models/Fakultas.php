<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
    public function jurusan()
    {
        return $this->hasMany(Jurusan::class);
    }
}
