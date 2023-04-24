<?php

namespace App\Models;

use App\Models\BaseModel;

class Address extends BaseModel
{
    protected $table = 'addresses';

    protected $fillable = [
        'street',
        'city',
        'postal_code',
        'country',
    ];
}