<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SniPeserta extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $table = "sni_peserta";

    public function getSniPeserta($user_id)
    {
        $ret_val = DB::table('sni_peserta')
            ->join('master_sni', 'master_sni.id', '=', 'sni_peserta.master_sni_id')
            ->select('sni_peserta.*', 'master_sni.judul_sni', 'master_sni.no_sni')
            ->where('user_id',$user_id)
            ->get();
        
        return $ret_val;
    }

}
