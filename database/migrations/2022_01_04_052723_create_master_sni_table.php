<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterSniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_sni', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('no_sni',300)->nullable();
            $table->string('judul_sni',500)->nullable();
            $table->string('status',20)->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }
    



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_sni');
    }
}
