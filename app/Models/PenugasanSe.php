<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PenugasanSe extends Model
{
    use HasFactory;
    protected $table = "penugasan_se";
    protected $guarded = [''];

    public function getPenugasanWithEvaluator($user_id){
        $ret_val = DB::table('penugasan_se')
            ->join('evaluator', 'evaluator.user_id', '=', 'penugasan_se.evaluator_id')
            ->select('penugasan_se.*','evaluator.nama_lengkap')
            ->where('peserta_id',$user_id)
            ->get();
        return $ret_val;
    }

    public function getPenugasanByIdEvaluator($id)
    {
        $ret_val = DB::table('penugasan_se')
            ->join('peserta', 'peserta.user_id', '=', 'penugasan_se.peserta_id')
                ->select('penugasan_se.peserta_id','penugasan_se.umpan_balik','penugasan_se.mulai','penugasan_se.hingga','peserta.nama_organisasi','penugasan_se.id','penugasan_se.status')
                // ->where('status',0)
                ->where('evaluator_id',$id)
                ->get();
        return $ret_val;
    }

    public function verifikasiPenugasanSe($id)
    {
        $ret_val = DB::table('penugasan_se')
        ->where('peserta_id',$id)
        ->update(['status'=>1]);
        return $ret_val;
    }

    public function getPesertaId($id)
    {
        $ret_val = DB::table('penugasan_se')
        ->where('id',$id)
        ->select('peserta_id')
        ->get()->first();
        return $ret_val;
    }
    public function uploadFileSe($data)
    {
        $ret_val = DB::table('penugasan_se')
        ->where('peserta_id',$data['peserta_id'])
        ->update(['status'=>2 , 'file_penilaian'=> $data['file_penilaian'] ]);
        return $ret_val;
    }

    public function historyPenugasanSe($evaluator_id)
    {
        $ret_val = DB::table('penugasan_se')
        ->join('peserta', 'peserta.user_id', '=', 'penugasan_se.peserta_id')
        ->where('penugasan_se.evaluator_id',$evaluator_id)
        ->where('penugasan_se.status', 2)
        ->select('penugasan_se.*','peserta.nama_organisasi')
        ->orderByDesc('updated_at')
        ->take(3)
        ->get();

        return $ret_val;
    }
    public function historyPenugasanSeByEvaluator($evaluator_id)
    {
        $ret_val = DB::table('penugasan_se')
        ->join('peserta', 'peserta.user_id', '=', 'penugasan_se.peserta_id')
        ->where('penugasan_se.evaluator_id',$evaluator_id)
        ->where('penugasan_se.status', 2)
        ->select('penugasan_se.updated_at','peserta.nama_organisasi')
        ->orderByDesc('updated_at')
        ->get();
        return $ret_val;
    }
    public function uploadUmpanBalik($data)
    {
        $ret_val = DB::table('penugasan_se')
        ->where('peserta_id',$data['peserta_id'])
        ->update(['umpan_balik'=> $data['umpan_balik'] ]);
        return $ret_val;
    }
}
