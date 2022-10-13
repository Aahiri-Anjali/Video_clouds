<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportExcelModel extends Model
{
    use HasFactory;
    protected $table = "importexcel";
    protected $fillable = ['user_id','name','email','mobile'];
}
