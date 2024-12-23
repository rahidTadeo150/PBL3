<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class RequestPrestasi extends Model
{
    use HasFactory;
    protected $table = 'request_prestasi';
    protected $guarded = ['id'];

    public function Mahasiswa() {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function Category() {
        return $this->belongsTo(CategoryPrestasi::class, 'category_prestasi_id');
    }

    public function Tingkatan() {
        return $this->belongsTo(Tingkatan::class, 'tingkatan_id');
    }

    public function getTanggalPenutupanAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y H:i');
    }

    public function getUpdatedAtAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y H:i');
    }
}
