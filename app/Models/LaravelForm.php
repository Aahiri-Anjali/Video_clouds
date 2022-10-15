<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaravelForm extends Model
{
    use HasFactory;
   protected $table ="laravelform";
   protected $fillable = ['first_name','last_name',
                           'address',
                           'fruits',
                           'email',
                           'state',
                           'zip_code',
                           'file',
                           'gender',];
}
