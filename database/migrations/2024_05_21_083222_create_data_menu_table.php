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
        Schema::create('data_menu', function (Blueprint $table) {
            $table->id();
            $table->string('kd_menu');
            $table->string('kd_barang');
            $table->string('nama_menu');
            $table->decimal('harga', 8, 2);
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_menu');
    }
};
