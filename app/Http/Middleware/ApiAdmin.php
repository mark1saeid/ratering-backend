<?php

namespace App\Http\Middleware;

use Closure;

class ApiAdmin
{
    public function handle($request, Closure $next)
    {
        if( $request->api_password !== env('API_PASSWORD','LNy3uNOIUUiQ5p9W9Mk2haTkdwHR')||  $request->api_user !== env('API_USER','apiusername')){
            return response()->json(['message' => 'Unauthenticated.']);
        }

        return $next($request);
    }
}
