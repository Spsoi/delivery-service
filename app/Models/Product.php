<?php

namespace App\Models;

use App\Models\BaseModel;

class Product extends BaseModel
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}