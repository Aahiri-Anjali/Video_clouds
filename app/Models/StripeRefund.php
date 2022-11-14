<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StripeRefund extends Model
{
    use HasFactory;
    protected $table = 'stripe_refund';
    protected $fillable = ['user_id','charge_id','amount'];
}
