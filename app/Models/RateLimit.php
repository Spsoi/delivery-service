<?php

namespace App\Models;

class Ratelimit extends BaseModel
{
    protected $table = 'rate_limit';

    protected $fillable = [
        'user_id',
        'requests',
        'updated_at',
    ];

    public function scopeUser($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }

    public static function scopeRecent($query)
    {
        $currentTime = date('Y-m-d H:i:s');
        return $query->where('updated_at', '<', date('Y-m-d H:i:s', strtotime($currentTime) - 60));
    }
}