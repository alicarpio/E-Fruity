<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;
class Category extends Model
{

    protected $primaryKey = 'category_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'name'
    ];


    public function fruits()
    {
        return $this->hasMany(Fruit::class, 'category_id');
    }

    protected $hidden = ['created_at', 'updated_at', 'category_id'];


}
