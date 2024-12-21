<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Prestasi extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'prestasi';
    protected $guarded = ['id'];

    public function setNamaPerlombaanAttribute($value) {
        $this->attributes['nama_perlombaan'] = ucwords(strtolower($value));
    }

    public function MahasiswaPrestasi() {
        return $this->hasMany(MahasiswaPrestasi::class, 'id');
    }

    public function CategoryPrestasi() {
        return $this->belongsTo(CategoryPrestasi::class, 'category_prestasi_id', 'id');
    }

    public function Tingkatan() {
        return $this->belongsTo(Tingkatan::class, 'tingkatan_id', 'id');
    }
}
