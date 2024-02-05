<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterDokumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_dokumen', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('tipe_dokumen',20)->nullable(false)->unique();
            $table->string('format_file',5)->nullable(false);
            $table->integer('maks_ukuran')->default(5)->nullable(false);
            $table->boolean('wajib')->default(true)->nullable(false);
            $table->string('deskripsi',30)->nullable();
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
        Schema::dropIfExists('master_dokumen');
    }
}
