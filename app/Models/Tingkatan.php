<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tingkatan extends Model
{
    use HasFactory;
    protected $table = 'tingkatan';
    protected $guarded = ['id'];

    public function Beasiswa()
    {
        return $this->hasMany(Beasiswa::class);
    }

    public function Prestasi() {
        return $this->hasMany(Prestasi::class, 'id');
    }
}
