<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $table = 'prodi';
    protected $guarded = ['id'];

    public function Jurusan() {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function Mahasiswa() {
        return $this->hasMany(Mahasiswa::class, 'id');
    }
}
