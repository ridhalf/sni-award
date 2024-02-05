<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;
    protected $table ="pelatihan";
    protected $guarded = [''];

    public function user()
    {
        return $this->hasMany(Peserta::class);
    }
}
