<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $primaryKey = 'order_id';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'order_date',
        'order_status',
        'order_total'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    protected $hidden = ['created_at', 'updated_at'];
}
