<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        // return $next($request);
        header("Access-Control-Allow-Origin: *");
        // ALL OPTION METHOD
        $headers = [
            'Access-Control-Allow-Method' => 'POST, GET, OPTIONS, PUT, DELETE, PATCH, COPY, HEAD, LINK, UNLINK, PURGE, LOCK, UNLOCK, PROPFIND, VIEW',
            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Accept, Accept-Language, Save-Data, Last-Event-ID, DPR'
        ];
        if ($request->getMethod() == 'OPTIONS') {
            # if the client-side set only headers allowed in.... 
            return response()->json('OK', 200, $headers);
        }
        $response = $next($request);
        foreach ($headers as $key => $value) {
            $response->header($key, $value);
        }

        return $response;

    }
}
