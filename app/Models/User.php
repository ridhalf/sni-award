<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [''];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    public function peserta()
    {
        return $this->hasOne(Peserta::class);
    }

    public function evaluator()
    {
        return $this->hasOne(Evaluator::class);
    }

    public function pendidikan()
    {
        $this->belongsTo(User::class);
    }

    public function pekerjaan()
    {
        $this->belongsTo(User::class);
    }

    public function pelatihan()
    {
        $this->belongsTo(User::class);
    }

    public function sertifikat()
    {
        $this->belongsTo(User::class);
    }

    public function berita()
    {
        $this->belongsTo(User::class);
    }

    public function gambar()
    {
        $this->belongsTo(User::class);
    }

    public function sekretariat()
    {
        $this->belongsTo(User::class);
    }

    public function historyLogin()
    {
        $this->belongsTo(User::class);
    }

    public function kontak()
    {
        $this->belongsTo(User::class);
    }

    public function pertanyaanPeserta()
    {
        $this->belongsTo(User::class);
    }

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
    public function getUser($id)
    {
        return $this->firstWhere('id', $id);
    }
}
