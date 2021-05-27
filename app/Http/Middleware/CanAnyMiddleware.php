<?php

namespace App\Http\Middleware;

use Closure;

class CanAnyMiddleware
{
    public function handle($request, Closure $next, ...$permissions)
    {

        if(config('auth.authorization.enabled')) {
            foreach ($permissions as $permission) {
                if ($request->user()->can($permission)) {

                    return $next($request);
                }
            }
            return abort(403);
        }else{
            return $next($request);
        }
    }
}
