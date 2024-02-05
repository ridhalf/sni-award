<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluator', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users');
            $table->string('nama_lengkap',50)->nullable(true);
            $table->string('gelar_sebelum_nama',5)->nullable(true);
            $table->string('gelar_setelah_nama',5)->nullable(true);
            $table->string('status',20)->nullable(true);
            $table->date('tgl_lahir')->nullable(true);
            $table->string('pekerjaan',20)->nullable(true);
            $table->string('nama_instansi',50)->nullable(true);
            $table->string('jenis_kelamin',1)->nullable(true);
            $table->string('alamat',50)->nullable(true);
            $table->foreignId('master_provinsi_id')->nullable(true);
            $table->foreignId('master_kota_kabupaten_id')->nullable(true);
            $table->string('nomor_telepon',20)->nullable(true);
            $table->string('gambar',100)->nullable(true);
            $table->string('npwp',100)->nullable(true);   
            $table->string('ktp',100)->nullable(true); 
            $table->string('cv',100)->nullable(true); 
            $table->boolean('flag_complated')->default(0)->nullable(true)->default(false);
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
        Schema::dropIfExists('evaluator');
    }
}
