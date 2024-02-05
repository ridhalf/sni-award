<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pekerjaan extends Model
{
    use HasFactory;
    protected $table= "pekerjaan";
    protected $guarded = [''];

    public function user()
    {
        return $this->hasMany(Peserta::class);
    }

    public function verifikasi($id,$user_id)
    {
        return DB::table('pekerjaan')
                ->where('id', $id)
                ->where('user_id',$user_id)
                ->update(['status' => true]);
    }
}
