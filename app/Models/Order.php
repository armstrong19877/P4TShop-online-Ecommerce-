<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'email',
        'address',
        'phone',
        'total_price',
        'note',
        'user_id',
        'order_status',
       // 'payment',
        'total_qty',
        //'terms',
    ];



    
}
