<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('request_prestasi', function (Blueprint $table) {
            $table->id();
            $table->String('id_mahasiswa');
            $table->String('nama_perlombaan');
            $table->date('tanggal_perlombaan');
            $table->String('foto_bukti_prestasi');
            $table->String('tingkatan_id');
            $table->String('category_prestasi_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_prestasi');
    }
};
