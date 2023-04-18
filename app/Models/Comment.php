<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_product',
        'id_macbook',
        'id_appwatch',
        'id_customer',
        'id_category',
        'content',
    ];

    public function product()//foreign
    {
        return $this->belongsTo(Product::class,'id_product');
    }
    public function macbook()//foreign
    {
        return $this->belongsTo(MacBook::class,'id_macbook');
    }
    public function appwatch()//foreign
    {
        return $this->belongsTo(AppWatch::class,'id_appwatch');
    }
    public function customer()//foreign
    {
        return $this->belongsTo(Customer::class,'id_customer');
    }
}
