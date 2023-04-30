<?php

namespace App\Models;

use App\Models\BaseModel;

class CustomerOrders extends BaseModel
{
    protected $table = 'customer_orders';

    protected $fillable = [
        'customer_id',
        'order_id',
    ];
}