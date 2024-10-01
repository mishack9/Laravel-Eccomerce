<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paypal_payment extends Model
{
    use HasFactory;

       protected $fillable = [

        'payment_id',
        'product_name',
        'quantity',	
        'amount',	
        'currency',	
        'payer_name',	
        'payer_email',	
        'payer_status',	
        'payer_method'

       ];
}
