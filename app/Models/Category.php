<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];

    public function comment(){//primary key
        return $this->hasMany(Comment::class,'id_category');
    }
    public function images(){//primary key
        return $this->hasMany(Image::class,'id_category');
    }
    public function product(){//primary key
        return $this->hasMany(Product::class,'id_category');
    }
    public function macbook(){//primary key
        return $this->hasMany(MacBook::class,'id_category');
    }
    public function appwatch(){//primary key
        return $this->hasMany(AppWatch::class,'id_category');
    }
  
}
