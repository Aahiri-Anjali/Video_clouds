<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stripe extends Model
{
    use HasFactory;
    protected $table = "stripe_gateway";

    protected $fillable = ['user_id','customer_id','card_id','charge_id','amount'];

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
