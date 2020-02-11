<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class CheckAge
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
        if ($request->age <= 200) {
            return response()->json(array('status' => 400), 400);
        }

        return $next($request);
    }
}