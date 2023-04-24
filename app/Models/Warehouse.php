<?php

namespace App\Models;

use App\Models\BaseModel;

class Warehouse extends BaseModel
{
    protected $table = 'warehouse';

    protected $fillable = [
        'id',
        'user_id',
        'address_id',
        'is_warehouse',
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class, 'id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id');
    }
}