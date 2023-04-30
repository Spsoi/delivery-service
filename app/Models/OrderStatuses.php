<?php

namespace App\Models;

use App\Models\BaseModel;

class OrderStatuses extends BaseModel
{
    protected $table = 'order_statuses';

    protected $fillable = [
        'name',
    ];
}