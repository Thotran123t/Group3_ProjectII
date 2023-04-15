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
    public function cart_product(){//primary key
        return $this->hasMany(Cart_Product::class);
    }
    public function customer(){//primary key
        return $this->belongsTo(Customer::class);
    }
}
