<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamaBarangToStoksTable extends Migration
{
    public function up()
    {
        Schema::table('stoks', function (Blueprint $table) {
            $table->string('nama_barang')->after('menu_id');
        });
    }

    public function down()
    {
        Schema::table('stoks', function (Blueprint $table) {
            $table->dropColumn('nama_barang');
        });
    }
}

