<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ApiUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected  $table = "api_users";

    protected $fillable = ['name','email','password'];
}
