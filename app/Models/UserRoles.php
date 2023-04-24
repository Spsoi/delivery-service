<?php

namespace App\Models;

use App\Models\BaseModel;

class UserRoles extends BaseModel
{
    protected $table = 'users_roles';

    protected $fillable = [
        'id',
        'name',
        'description'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}