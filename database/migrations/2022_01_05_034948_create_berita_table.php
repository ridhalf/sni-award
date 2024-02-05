<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->foreignId('user_id')->constrained('users');
            $table->string('kategori')->nullable();
            $table->string('judul',100)->nullable();
            $table->string('slug',100)->nullable();
            $table->text('konten')->nullable();
            $table->string('gambar')->nullable();
            $table->string('potongan_berita')->nullable();
            $table->date('rilis');           
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
        Schema::dropIfExists('berita');
    }
}
