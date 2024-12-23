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
        Schema::create('trx_sewa', function (Blueprint $table) {
            $table->id();
            $table->string('mst_ruangan_id');
            $table->string('mst_harga_sewa_id');
            $table->string('mst_profil_id');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->string('keperluan');
            $table->integer('diskon');
            $table->string('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
