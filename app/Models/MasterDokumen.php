<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterDokumen extends Model
{
    use HasFactory;
    protected $table = "master_dokumen";
    protected $guarded = [''];

    public function dokumenPeserta()
    {
        $this->belongsTo(User::class);
    }

    public function dokumenEvaluator()
    {
        $this->belongsTo(User::class);
    }

    public function dokumenBerita()
    {
        $this->belongsTo(User::class);
    }

    public function dokumenCapacityBuilding()
    {
        $this->belongsTo(User::class);
    }
    
    public function dokumenSniAward()
    {
        $this->belongsTo(User::class);
    }
}
