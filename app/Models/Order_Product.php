<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_product',
        'id_macbook',
        'id_appwatch',
        'id_order',
        'id_category',
        'quantity',
        'price'
    ];

    public function order()//primary key 
    {
        return $this->belongsTo(Order::class,'id_order');
    }
    public function product()//foreign key 
    {
        return $this->belongsTo(Product::class,'id_product');
    }
    public function macbook()//foreign key 
    {
        return $this->belongsTo(MacBook::class,'id_macbook');
    }
    public function appwatch()//foreign key 
    {
        return $this->belongsTo(AppWatch::class,'id_appwatch');
    }
    
}
