<?php

namespace App\Http\Middleware;


use Closure;
use http\Exception;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use JWTAuth;
use Auth;


class Authenticate extends Middleware
{

 //  protected function redirectTo($request){
 //     if (! $request->expectsJson()) {
        //  return route('api/login');
         //  route('login')
  //    }
 //   }

    public function handle($request, Closure $next) {
        try {
            $jwt = JWTAuth::parseToken()->authenticate();
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            $jwt = false;
        }
        if (Auth::check() || $jwt) {
            return $next($request);
        } else {
            return response()->json([
                'status' => 'A401',
                'msg' => 'Non Authorized'
            ]);
        }
    }

}
