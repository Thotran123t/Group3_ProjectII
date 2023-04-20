<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_customer',
        'id_category',
        'content',
    ];

   
    public function customer()//foreign
    {
        return $this->belongsTo(Customer::class,'id_customer');
    }
    public function category()//foreign
    {
        return $this->belongsTo(Category::class,'id_category');
    }
}
