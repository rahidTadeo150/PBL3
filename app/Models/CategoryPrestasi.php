<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPrestasi extends Model
{
    use HasFactory;
    protected $table = 'category_prestasi';
    protected $guarded = ['id'];

    public function CategoryPrestasi() {
        return $this->hasMany(CategoryPrestasi::class, 'id');
    }
}
