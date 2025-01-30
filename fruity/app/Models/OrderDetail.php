<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'quantity',
        'unit_price',
        'subtotal'
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function fruits()
    {
        return $this->belongsTo(Fruit::class, 'fruit_id');
    }



    protected $hidden = ['created_at', 'updated_at'];
}
