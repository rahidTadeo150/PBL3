<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $table = 'jurusan';
    protected $guarded = ['id'];

    public function Jurusan() {
        return $this->hasMany(Prodi::class);
    }
}
