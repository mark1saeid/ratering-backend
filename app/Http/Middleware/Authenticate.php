<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Tymon\JWTAuth\Contracts\Providers\Auth;


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @param AuthenticationException $exception
     * @return string|null
     */
   protected function redirectTo($request)
   {
      if (! $request->expectsJson()) {
          return route('/');
         //  route('login')
      }
    }



}
