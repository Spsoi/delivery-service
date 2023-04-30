<?php

namespace App\Models;

use App\Models\BaseModel;

class OrderProducts extends BaseModel
{
    protected $table = 'order_products';

    protected $fillable = [
        'order_id',
        'product_id',
    ];
}