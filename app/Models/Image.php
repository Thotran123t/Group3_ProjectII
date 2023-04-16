<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_product',
        'path',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'id_product');
    }
}
