<?php

namespace App\Http\Middleware;


use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @param AuthenticationException $exception
     * @return string|null
     */
  // protected function redirectTo($request)
  // {
   //    if (! $request->expectsJson()) {
    //       return response()->json(['message' => 'Unauthenticated.']);
         //  route('login')
   //    }
  //  }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return response()->json(['error' => 'Unauthenticated.'], 401);
    }

}
