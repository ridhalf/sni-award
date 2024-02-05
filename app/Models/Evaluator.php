<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Evaluator extends Model
{
    use HasFactory;
    protected $table = "evaluator";
    protected $guarded = [''];

    public function user()
    {
        return $this->hasOne(Peserta::class);
    }

    public function masterProvinsi()
    {
        return $this->hasMany(Peserta::class);
    }

    public function masterKotaKabupaten()
    {
        return $this->hasMany(Peserta::class);
    }

    public function updateEvaluator($dataEvaluator ,$id){
        DB::table('evaluator')
                ->where('user_id', $id)
                ->update(['nama_lengkap' => $dataEvaluator['nama_lengkap'],
                        'gelar_sebelum_nama' => $dataEvaluator ['gelar_sebelum_nama'],
                        'gelar_setelah_nama' => $dataEvaluator ['gelar_setelah_nama'],
                        'tgl_lahir' => $dataEvaluator ['tgl_lahir'],
                        'pekerjaan' => $dataEvaluator ['pekerjaan'],
                        'nama_instansi' => $dataEvaluator ['nama_instansi'],
                        'jenis_kelamin' => $dataEvaluator ['jenis_kelamin'],
                        'alamat' => $dataEvaluator ['alamat'],
                        'master_provinsi_id' => $dataEvaluator ['master_provinsi_id'],
                        'master_kota_kabupaten_id' => $dataEvaluator ['master_kota_kabupaten_id'],
                        'nomor_telepon' => $dataEvaluator ['nomor_telepon'],
                        'gambar' => $dataEvaluator ['gambar'],
                        'npwp' => $dataEvaluator ['npwp'],
                        'ktp' => $dataEvaluator ['ktp'],
                    ]);
    }

    public function getNamaEvaluator($user_id)
    {
        $ret_val = DB::table('evaluator')
                    ->where('user_id',$user_id)
                    ->select('nama_lengkap')
                    ->get()->first();
        return $ret_val;
    }
    public function jumlahEvaluator()
	{
		$ret_val = DB::table('evaluator')
                ->where('flag_complated',true)
				->count();
		return $ret_val;
	}
}
