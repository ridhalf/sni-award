<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalAcaraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_acara', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->string('judul')->nullable();
            $table->string('kategori')->nullable();
            $table->string('link_meet')->nullable()->default('-');
            $table->date('mulai')->nullable();
            $table->date('hingga')->nullable();
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
        Schema::dropIfExists('jadwal_acara');
    }
}
