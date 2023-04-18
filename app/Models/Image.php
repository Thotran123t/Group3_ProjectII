<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_product',
        'id_macbook',
        'id_appwatch',
        'id_category',
        'path',
    ];

   
    public function product()
    {
        return $this->belongsTo(Product::class,'id_product');
    }
    public function macbook()
    {
        return $this->belongsTo(MacBook::class,'id_macbook');
    }
   
    public function appwatch()
    {
        return $this->belongsTo(AppWatch::class,'id_appwatch');
    }
}
