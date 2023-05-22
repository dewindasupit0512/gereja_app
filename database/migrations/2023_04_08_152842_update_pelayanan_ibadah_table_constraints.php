<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('pelayanan_ibadah', function (Blueprint $table) {
            $table->foreign('id_peran_anggota')->references('id')->on('peran_anggota')->change()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_jadwal_ibadah')->references('id')->on('jadwal_ibadah')->change()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('pelayanan_ibadah', function (Blueprint $table) {
            $table->dropForeign('id_peran_anggota');
            $table->dropForeign('id_jadwal_ibadah');
        });
    }
};
