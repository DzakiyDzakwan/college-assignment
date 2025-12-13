<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dosen extends Model
{
    use HasFactory;
    
    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function fakultas()
    {
        return $this->hasOne(Fakultas::class);
    }
    public function kelas()
    {
        return $this->belongsToMany(Kelas::class);
    }
    public function mata_kuliah()
    {
        return $this->hasManyThrough(Mata_kuliah::class, Kelas::class);
    }
}


