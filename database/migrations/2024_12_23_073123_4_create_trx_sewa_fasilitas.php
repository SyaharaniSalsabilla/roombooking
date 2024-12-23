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
        Schema::create('trx_sewa_fasilitas', function (Blueprint $table) {
            $table->id();
            $table->string('trx_sewa_id');
            $table->string('mst_fasilitas_id');
            $table->integer('kuantitas');
            $table->double('satuan');
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
