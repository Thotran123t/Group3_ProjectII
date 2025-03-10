<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacity extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
    ];

    public function product(){//primary key
        return $this->hasMany(Product::class,'id_capacity');
    }
    public function mackbook(){//primary key
        return $this->hasMany(MacBook::class,'id_capacity');
    }
    public function appwatch(){//primary key
        return $this->hasMany(AppWatch::class,'id_capacity');
    }
}
