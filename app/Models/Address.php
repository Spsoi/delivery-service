<?php

namespace App\Models;

use App\Models\BaseModel;

class Address extends BaseModel
{
    protected $table = 'addresses';

    protected $fillable = [
        'id',
        'street',
        'city',
        'postal_code',
        'country',
        
    ];
}