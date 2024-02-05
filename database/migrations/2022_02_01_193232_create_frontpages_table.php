<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontpagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontpages', function (Blueprint $table) {
            $table->id();
            $table->string('judul',100)->nullable();
            $table->string('gambar_judul')->nullable();
            $table->text('ket_judul')->nullable();
            $table->string('tentang_sniaward',100)->nullable();
            $table->text('ket_sniaward')->nullable();
            $table->string('berita',100)->nullable();
            $table->text('ket_berita')->nullable();
            $table->string('unduhberkas',100)->nullable();
            $table->text('ket_unduhberkas')->nullable();
            $table->string('gambar_unduhberkas')->nullable();
            $table->string('linimasa',100)->nullable();
            $table->string('gambar_linimasa')->nullable();
            $table->string('kumpulanacara',100)->nullable();
            $table->string('gambar_kumpulanacara')->nullable();
            $table->text('ket_kumpulanacara')->nullable();
            $table->string('dokumentasi',100)->nullable();
            $table->string('pertanyaan',100)->nullable();
            $table->text('ket_pertanyaan')->nullable();
            $table->string('gambar_pertanyaan')->nullable();
            $table->string('kontakkami',100)->nullable();
            $table->text('ket_kontakkami')->nullable();
            $table->string('linkfacebook',100)->nullable();
            $table->string('linktwitter',100)->nullable();
            $table->string('linkinstagram',100)->nullable();
            $table->string('webbsn',100)->nullable();
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
        Schema::dropIfExists('frontpages');
    }
}
