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
        Schema::create('pesanan_pelanggan', function (Blueprint $table) {
            $table->id();
            $table->integer('kd_pelanggan');
            $table->date('tanggal');
            $table->string('nama_pelanggan');
            $table->string('nama_pesanan');
            $table->integer('jumlah');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan_pelanggan');
    }
};
