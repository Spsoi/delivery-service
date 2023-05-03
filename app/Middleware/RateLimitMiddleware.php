<?php

namespace App\Middleware;

use App\Models\Ratelimit;
use Exception;

class RateLimitMiddleware {

    public static function ratelimit($user_id, $requests_per_minute = 10) {
        $query = Ratelimit::where('user_id', $user_id);
        $requests = $query->first() ? $query->first()->requests : 0;
        if ($requests >= $requests_per_minute) {
            $ratelimit = Ratelimit::scopeRecent($query);
            if ($ratelimit->count() > 0) {
                $ratelimit->update(['requests' => 1]);
                return true;
            } else {
                return throw new Exception('Превышен интервал запрос, подождите', http_response_code(429));
            }
        }
        
        $ratelimit = $query->first();
    
        if ($ratelimit) {
            $ratelimit->requests += 1;
            $ratelimit->save();
        } else {
            Ratelimit::create([
                'user_id' => $user_id,
                'requests' => 1,
            ]);
        }
    
        return false;
    }
}

