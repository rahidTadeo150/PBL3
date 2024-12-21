<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Mahasiswa extends Authenticatable
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $guarded = ['id'];
    protected $casts = [
        'password' => 'hashed'
    ];

    public function MahasiswaPrestasi() {
        return $this->hasMany(MahasiswaPrestasi::class, 'mahasiswa_id', 'id');
    }

    public function MahasiswaRequest() {
        return $this->hasMany(RequestPrestasi::class, 'mahasiswa_id', 'id');
    }

    public function Prodi() {
        return $this->belongsTo(Prodi::class, 'prodi_id','id');
    }
}
