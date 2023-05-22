<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('jadwal_ibadah', function (Blueprint $table) {
            $table->id();
            $table->dateTime('waktu');
            $table->unsignedBigInteger('tempat_ibadah');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal_ibadah');
    }
};
