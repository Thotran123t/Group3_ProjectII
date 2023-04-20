<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MacBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id_category',
        'id_ram',
        'id_color',
        'id_capacity',
        'image',
        'price',
        'quantity',
        'description',
    ];
    public function cart_product() //primary key 
    {
        return $this->hasMany(Cart_Product::class, 'id_macbook');
    }
    public function order_product() //primary key 
    {
        return $this->hasMany(Order_Product::class, 'id_macbook');
    }


    public function category() //foreign key
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
    public function ram() //foreign key
    {
        return $this->belongsTo(Ram::class, 'id_ram');
    }
    public function color() //foreign key
    {
        return $this->belongsTo(Color::class, 'id_color');
    }
    public function capacity() //foreign key
    {
        return $this->belongsTo(Capacity::class, 'id_capacity');
    }
}
