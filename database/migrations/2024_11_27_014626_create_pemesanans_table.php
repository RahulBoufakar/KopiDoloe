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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pelanggan')->references('id')->on('users')->onDelete('cascade');
            $table->date('tanggal_pemesanan');
            // $table->datetimes('tanggal_pemesanan');
            $table->string('detail_pesanan');
            // $table->json('detail_pesanan')->nullable();
            $table->integer('total_harga');
            // $table->enum('status', ['Belum Dibayar', 'Sudah Dibayar']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
