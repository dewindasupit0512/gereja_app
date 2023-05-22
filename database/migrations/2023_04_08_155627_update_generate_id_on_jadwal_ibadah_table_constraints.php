<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('jadwal_ibadah', function (Blueprint $table) {
            $table->foreign('generate_id')->references('id')->on('jadwal_generates')->change()->onUpdate('cascade')->onDelete('cascade');            
        });
    }

    public function down()
    {
        Schema::table('jadwal_ibadah', function (Blueprint $table) {
            $table->dropForeign('generate_id');
        });
    }
};
