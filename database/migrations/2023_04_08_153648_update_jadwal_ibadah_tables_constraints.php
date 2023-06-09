<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jadwal_ibadah', function (Blueprint $table) {
            $table->foreign('tempat_ibadah')->references('id')->on('jemaat')->change()->onUpdate('cascade')->onDelete('cascade');            
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jadwal_ibadah', function (Blueprint $table) {            
            $table->dropForeign('tempat_ibadah');
        });
    }
};
