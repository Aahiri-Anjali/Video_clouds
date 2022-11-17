<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login_History extends Model
{
    use HasFactory;

    protected $table = "login_history";
    protected $fillable = ['name','email'];
}
