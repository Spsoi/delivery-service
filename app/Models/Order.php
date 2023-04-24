<?php

namespace App\Models;

use App\Models\BaseModel;

class Order extends BaseModel
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'seller_address',
        'delivery_address',
        'delivery_cost',
        'status',
        'description',
        'name',
        'price',
    ];

    protected $hidden = [
        'password',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}