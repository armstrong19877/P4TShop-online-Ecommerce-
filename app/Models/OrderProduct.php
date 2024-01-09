<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'order_id',
        'qty',
        'product_id',
        'product_name',
    ];
    

    public function user(){
        $this->belongsTo(User::class);
    }
}