<?php

namespace App\Models;

use App\Models\BaseModel;

class Order extends BaseModel
{
    protected $table = 'orders';

    protected $fillable = [
        'customer_id',
        'seller_id',
        'delivery_id',
        'delivery_deadline',
        'delivery_completed_at',
        'seller_address_id',
        'delivery_address_id',
        'status',
        'description',
        'name',
        'delivery_price',
        'products_price',
        'total_price',
        'status_id',
    ];

    protected $hidden = [
        'password',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}