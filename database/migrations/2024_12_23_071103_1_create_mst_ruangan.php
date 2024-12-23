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
        if (!Schema::hasTable('mst_ruangan')) {
        Schema::create('mst_ruangan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ruangan');
            $table->string('kapasitas');
            $table->string('lokasi');
            $table->integer('panjang_ruangan');
            $table->integer('lebar_ruangan');
            $table->string('deskripsi');
            $table->string('image');
            $table->double('harga');
            $table->timestamps();
        });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
