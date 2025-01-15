<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fruit extends Model
{
    protected $fillable = [
        'name',
        'url_image',
        'description',
        'price',
        'stock'
    ];
}
