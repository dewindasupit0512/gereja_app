<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('peran_anggota', function (Blueprint $table) {
            $table->foreign('id_anggota')->references('id')->on('anggota')->change()->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreign('id_peran')->references('id')->on('perans')->change()->onUpdate('cascade')->onDelete('cascade')->nullable();
        });
    }

    public function down()
    {
        Schema::table('peran_anggota', function (Blueprint $table) {
            $table->dropForeign('id_anggota');
            $table->dropForeign('id_peran');
        });

    }
};
