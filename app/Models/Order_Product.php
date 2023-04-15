<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_product',
        'id_order',
        'quantity',
        'price'
    ];

    
    public function product()//primary key 
    {
        return $this->belongsTo(Product::class);
    }
    public function order()//primary key 
    {
        return $this->belongsTo(Order::class);
    }
}
