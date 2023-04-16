<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_customer',
        'address',
        'date',
        'status',
    ];
    public function order_product(){//primary key
        return $this->hasMany(Order_Product::class,'id_order');
    }
    public function customer(){//primary key
        return $this->belongsTo(Customer::class,'id_customer');
    }
}
