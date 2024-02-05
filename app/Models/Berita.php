<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Berita extends Model
{
    use HasFactory;
    protected $table = "berita";
    protected $guarded = [''];

    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function getBeritaWithSlug($slug)
    {
        return DB::table('berita')->where('slug', $slug)->first();
    }
}
