<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanPeserta extends Model
{
    use HasFactory;
    protected $table = "pertanyaan_peserta";
    protected $guarded = [''];
    public function user()
    {
        return $this->hasMany(Peserta::class);
    }
    public function masterPertanyaan()
    {
        return $this->hasMany(Peserta::class);
    }

    public function inputDataPertanyaanPeserta($item,$data)
    {

        $pertanyaan =  DB::table('pertanyaan_peserta')->insert([
            'user_id' => '',
            'master_pertanyaan_id' => $item->id,
            'jawaban' => $item,
        ]);
    }
}
