<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Psy\Command\WhereamiCommand;

class Peserta extends Model
{
	use HasFactory;
	protected $primaryKey = 'user_id';
	protected $table = "peserta";

	protected $guarded = [''];

	public function user()
	{
		return $this->hasOne(Peserta::class);
	}
	public function masterSektorKategori()
	{
		return $this->hasMany(Peserta::class);
	}

	public function masterKotaKabupaten()
	{
		return $this->hasMany(Peserta::class);
	}
	public function masterSni()
	{
		return $this->hasMany(Peserta::class);
	}

	public function getPesertaWithUserId($user_id)
	{
		$result = DB::table('peserta')->where('user_id', $user_id)->get()->first();
		return $result;
	}

	public function daftarDokumen()
	{
		return $this->hasMany(DokumenPeserta::class, 'user_id', 'user_id');
	}

	public function dataPeserta($user_id)
	{
		$ret_val = DB::table('peserta')
            ->join('master_provinsi', 'master_provinsi.id', '=', 'peserta.master_provinsi_id')
			->join('master_kota_kabupaten','master_kota_kabupaten.id','=','peserta.master_kota_kabupaten_id')
			// ->join('master_sni','master_sni.id','=','peserta.master_sni_id')
			->join('master_sektor_kategori','master_sektor_kategori.id','=','peserta.master_sektor_kategori_id')
            ->select('peserta.*', 'master_provinsi.nama AS nama_provinsi','master_kota_kabupaten.nama as nama_kabupaten','master_sektor_kategori.nama_kategori')
            ->where('user_id',$user_id)
            ->get();
        return $ret_val;
	}

	public function getNamaPeserta($id)
	{
		$ret_val = DB::table('peserta')
		->select('user_id','nama_organisasi')
		->where('user_id',$id)
		->get()
		->first();
		return $ret_val;

	}

	public function jumlahPeserta()
	{
		$ret_val = DB::table('peserta')
				->count();
		return $ret_val;
	}
}
