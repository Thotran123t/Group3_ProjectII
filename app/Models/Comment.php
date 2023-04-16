<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_product',
        'id_customer',
        'content',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'id_product');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class,'id_customer');
    }
}
