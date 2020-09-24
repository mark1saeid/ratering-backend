<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
  //  protected function redirectTo($request)
  //  {
   //     if (! $request->expectsJson()) {
      //     return route('login');

         //  return Route::post('api/auth/login', 'Api\UserControllers@login');
    //    }
   // }


    public function handle($request, Closure $next)
    {
        if(!empty(trim($request->input('api_token')))){

            $is_exists = User::where('id' , Auth::guard('api')->id())->exists();
            if($is_exists){
                return $next($request);
            }
        }
        return response()->json('Invalid Token', 401);
    }
}
