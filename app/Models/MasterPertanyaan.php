<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MasterPertanyaan extends Model
{
    use HasFactory;
    protected $table = "master_pertanyaan";
    protected $guarded = [''];
    public function pertanyaanPeserta()
    {
        $this->belongsTo(PertanyaanPeserta::class);
    }
    
    public function getPertanyaan($tipe_pertanyaan)
    {
        $pertanyaan =  DB::table('master_pertanyaan')
        ->select('id','pertanyaan')
        ->where('tipe_pertanyaan','=',$tipe_pertanyaan)
        ->get();
        return $pertanyaan;
    }

}
