<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSekretariatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekretariat', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users');
            $table->string('nama_lengkap',50)->nullable(false);
            $table->string('gambar',15);
            $table->boolean('flag_complated')->default(0)->nullable(true);
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
        Schema::dropIfExists('sekretariat');
    }
}
