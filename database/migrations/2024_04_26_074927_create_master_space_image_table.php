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
        Schema::create('master_space_image', function (Blueprint $table) {
            $table->id();
            $table->foreign('master_space_id')->references('id')->on('master_space');
            $table->unsignedBigInteger('master_space_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_space_image');
    }
};
