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
    public function macbook(){//primary key
        return $this->hasMany(MacBook::class,'id_color');
    }
    public function appwatch(){//primary key
        return $this->hasMany(AppWatch::class,'id_color');
    }
}
