<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
    ];

    public function product(){//primary key
        return $this->hasMany(Product::class,'id_color');
    }
}
