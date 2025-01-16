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

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    protected $hidden = ['created_at', 'updated_at'];


}
