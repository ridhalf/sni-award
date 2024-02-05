<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenPassword extends Model
{
    use HasFactory;
    protected $table = "token_password";
    protected $guarded = [''];
}
