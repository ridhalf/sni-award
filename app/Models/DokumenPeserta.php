<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DokumenPeserta extends Model
{
    use HasFactory;
    protected $table = "dokumen_peserta";
    protected $guarded = [''];
    public function user()
    {
        return $this->hasMany(Peserta::class);
    }
    public function masterDokumen()
    {
        return $this->hasMany(Peserta::class);
    }
    public function getDataDoc($id){
        $ret_val = DB::table('master_unggah_lampiran')
            ->join('dokumen_peserta', 'master_unggah_lampiran.id', '=', 'dokumen_peserta.master_unggah_lampiran_id')
            ->select('master_unggah_lampiran.*', 'dokumen_peserta.*')
            ->where('user_id',$id)
            ->get();
        return $ret_val;
    }

    public function varifikasi($id, $user_id, $lampiran_id)
    {
        $ret_val = DB::table('dokumen_peserta')
        ->where('id',$id)
        ->where('user_id',$user_id)
        ->where('master_unggah_lampiran_id',$lampiran_id)
        ->update(['status'=>1]);
        return $ret_val;

    }
    public function statusDokumen($user_id)
    {
        $ret_val = DB::table('dokumen_peserta')
        ->where('user_id',$user_id)
        ->select('status')
        ->get();
        return $ret_val;

    }
    public function lengkapiDokumen($id, $user_id, $lampiran_id)
    {
        $nama_file = $this->getNamaFile($id);
        $file = public_path('storage/').$nama_file;
        if(file_exists($file)){
            @unlink($file);
        }
        $ret_val = DB::table('dokumen_peserta')
        ->where('id',$id)
        ->where('user_id',$user_id)
        ->where('master_unggah_lampiran_id',$lampiran_id)
        ->update(['status'=>2,'nama_file' =>""]);
        return $ret_val;

    }
    private function getNamaFile($id)
    {
        $dokumen =DokumenPeserta::findOrFail($id);
        $nama_file = $dokumen->nama_file;

        return $nama_file;
    }
    
    public function updateDokumen($arr){
        $ret_val = DB::table('dokumen_peserta')
                ->where('user_id', $arr['user_id'])
                ->where('master_unggah_lampiran_id', $arr['master_unggah_lampiran_id'])
                ->where('status', $arr['status'])
                ->update(['nama_file' => $arr['nama_file'], 'status' => 0]);
        return $ret_val;
    }

    public function updateEvaluatorDokumenPeserta($evaluator_id,$peserta_id)
    {
        $ret_val = DB::table('dokumen_peserta')
                ->where('user_id',$peserta_id)
                ->update(['evaluator_id' => $evaluator_id]);
        return $ret_val;
    }

    public function cekEvaluatorDokumenPeserta($peserta_id){
        $ret_val = DB::table('dokumen_peserta')
                    ->where('user_id',$peserta_id)
                    ->select('evaluator_id')
                    ->get()->first();
        return $ret_val;

    }

    public function statusDokumenPeserta($peserta_id){
        $cekStatus = 1;
        $ret_val = DB::table('dokumen_peserta')
                    ->where('user_id',$peserta_id)
                    ->select('status')
                    ->get();
        foreach ($ret_val as $item ) {
            if ($item->status == 0 or $item->status == 2) {
                $cekStatus = 0;
                break;
            }
        }

        return $cekStatus;
    }

    public function cekDokumen($user_id)
    {
        $ret_val = DB::table('dokumen_peserta')
                    ->where('user_id',$user_id)
                    ->select('user_id')
                    ->get()->first();
        return $ret_val;
    }

    public function getPenugasan($idEvaluator){
        $ret_val = DB::table('dokumen_peserta')
        ->select('user_id')
        ->distinct()
        ->where('evaluator_id',$idEvaluator)
        ->get();
        return $ret_val;

    
    }
}
