<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next , $is_role)
    {
        $user=auth('api')->user();
        $role=$user->roles()->plunk('name')->toArray();
        if (! $role == $is_role){
            return $this->getErrors('Unauthorized', HTTPResponse::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
