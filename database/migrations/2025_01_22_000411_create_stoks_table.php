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
        Schema::create('stoks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->integer('jumlah');
            $table->timestamps();

            // Menambahkan kunci asing
            $table->foreign('menu_id')->references('id')->on('menu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stoks', function (Blueprint $table) {
            $table->dropForeign(['menu_id']);
            $table->dropColumn('menu_id');
        });

        Schema::dropIfExists('stoks');
    }
};
