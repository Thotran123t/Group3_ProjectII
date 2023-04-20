<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_category',
        'id_color',
        'path',
    ];

   
    public function category()
    {
        return $this->belongsTo(Category::class,'id_category');
    }
    public function color()
    {
        return $this->belongsTo(Color::class,'id_color');
    }
   
}
