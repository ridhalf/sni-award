<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenugasanSeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penugasan_se', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->foreignId('admin_id')->nullable()->constrained('users');
            $table->foreignId('evaluator_id')->nullable()->constrained('users');
            $table->foreignId('peserta_id')->nullable()->constrained('users');
            $table->string('kategori',50)->nullable();
            $table->string('file_penilaian',255)->nullable();
            $table->string('umpan_balik',255)->nullable();
            $table->boolean('status')->nullable()->comment('1 untuk terverifikasi, 0 untuk tertuna, 2 untuk selesai');
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
        Schema::dropIfExists('penugasan_se');
    }
}
