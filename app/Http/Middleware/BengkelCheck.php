<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class BengkelCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = JWTAuth::parseToken()->authenticate();
        if ($user->category === 'bengkel'){
            return $next($request);
        }else{
            return response()->json([
                'status' => 'ERROR',
                'msg' => 'your not bengkel owners'
            ],200);
        }
    }
}
