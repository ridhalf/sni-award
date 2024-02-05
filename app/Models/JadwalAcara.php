<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JadwalAcara extends Model
{
    use HasFactory;
    protected $table = "jadwal_acara";
    protected $guarded = [''];

    public function getJadwalAcara()
    {
        $ret_val = DB::table('jadwal_acara')
                    ->limit(10)
                    ->orderBy('mulai',)
                    ->get();
        return $ret_val;
    }
}
