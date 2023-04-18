<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function appwatch(){//primary key
        return $this->hasMany(AppWatch::class,'id_ram');
    }
}
