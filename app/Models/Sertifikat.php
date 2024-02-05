<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sertifikat extends Model
{
    use HasFactory;
    protected $table = "sertifikat";
    protected $guarded = [''];
    public function user()
    {
        return $this->hasMany(Peserta::class);
    }
    public function verifikasi($id,$user_id)
    {
        return DB::table('sertifikat')
                ->where('id', $id)
                ->where('user_id',$user_id)
                ->update(['status' => true]);
    }
}
