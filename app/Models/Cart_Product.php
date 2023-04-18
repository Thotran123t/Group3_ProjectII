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
        'id_macbook',
        'id_appwatch',

        'id_category',
        'quantity',
    ];
    
    public function cart(){//foreign key
        return $this->belongsTo(Cart::class,'id_cart');
    }
    public function product(){//foreign key
        return $this->belongsTo(Product::class,'id_product');
    }
    public function macbook(){//foreign key
        return $this->belongsTo(MacBook::class,'id_macbook');
    }
    public function appwatch(){//foreign key
        return $this->belongsTo(AppWatch::class,'id_appwatch');
    }
}
