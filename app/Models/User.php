<?php

namespace App\Models;

use App\Models\BaseModel;

class User extends BaseModel
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    protected $hidden = [
        'password',
    ];

    public function role()
    {
        return $this->belongsTo(UserRole::class, 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
}