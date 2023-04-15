<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_cart',
        'id_product',
    ];
    
    public function cart(){//primary key
        return $this->belongsTo(Cart::class);
    }
    public function product(){//primary key
        return $this->belongsTo(Product::class);
    }
}
