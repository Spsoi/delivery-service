<?php

namespace App\Models;

use App\Models\BaseModel;

class DeliveryTariff extends BaseModel
{
    protected $table = 'delivery_tariffs';

    protected $fillable = [
        'from_address_id',
        'to_address_id',
        'distance',
        'price',
    ];
}