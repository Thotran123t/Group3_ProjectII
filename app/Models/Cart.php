<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'id_customer',
    ];
    public function cart_product(){//primary key
        return $this->hasMany(Cart_Product::class);
    }
    public function customer(){//primary key
        return $this->belongsTo(Customer::class);
    }

}
