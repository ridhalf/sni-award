<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenPesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_peserta', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('evaluator_id')->nullable()->constrained('users');
            // $table->foreignId('master_dokumen_id');
            $table->foreignId('master_unggah_lampiran_id')->constrained('master_unggah_lampiran');
            $table->boolean('status',1)->default(false);
            $table->string('nama_file');
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
        Schema::dropIfExists('dokumen_peserta');
    }
}
