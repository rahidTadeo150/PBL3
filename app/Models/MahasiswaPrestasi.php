<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MahasiswaPrestasi extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'mahasiswa_prestasi';
    protected $guarded = ['id'];

    public function setPosisiJuaraAttribute($value) {
        $this->attributes['posisi_juara'] = ucwords(strtolower($value));
    }

    public function Mahasiswa() {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id');
    }

    public function Prestasi() {
        return $this->belongsTo(Prestasi::class, 'prestasi_id', 'id');
    }
}
