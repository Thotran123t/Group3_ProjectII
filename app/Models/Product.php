<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'id_category',
        'id_ram',
        'id_color',
        'id_capacity',
        'price',
        'quantity',
        'description',
    ];
    public function image()//primary key 
    {
        return $this->hasMany(Image::class);
    }
    public function comment()//primary key 
    {
        return $this->hasMany(Comment::class);
    }


    public function category()//foreign key
    {
        return $this->belongsTo(Category::class);
    }
    public function ram()//foreign key
    {
        return $this->belongsTo(Ram::class);
    }
    public function color()//foreign key
    {
        return $this->belongsTo(Color::class);
    }
    public function capacity()//foreign key
    {
        return $this->belongsTo(Capacity::class);
    }
    
}
