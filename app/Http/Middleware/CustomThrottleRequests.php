<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Symfony\Component\HttpFoundation\Response;

class CustomThrottleRequests extends ThrottleRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     // return $next($request);
    //     $maxAttempts = 5; // Maximum number of login attempts allowed
    //     $retryAfterSeconds = 60; // Time in seconds after which the user should retry
    //     return redirect()->back()
    //         ->withInput($request->except('password'))
    //         ->withErrors(['email' => "Too many login attempts. Please try again in $retryAfterSeconds seconds."]);
    // }
    protected function buildResponse(Request $request, int $maxAttempts, float $retryAfterSeconds)
    {
        return redirect()->back()
            ->withInput($request->except('password'))
            ->withErrors(['email' => "Too many login attempts. Please try again in $retryAfterSeconds seconds."]);
    }

}
