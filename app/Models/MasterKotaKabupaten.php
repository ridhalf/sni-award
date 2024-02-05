<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MasterKotaKabupaten extends Model
{
    use HasFactory;
    protected $table = "master_kota_kabupaten";
    protected $guarded = [''];

    public function peserta()
    {
        $this->belongsTo(User::class);
    }
    
    public function evaluator()
    {
        $this->belongsTo(User::class);
    }
    public function searchKabupaten($subs)
    {
        return DB::table('master_kota_kabupaten')
                ->where('region_id', 'like', $subs.'%')
                ->get();
    }
}
