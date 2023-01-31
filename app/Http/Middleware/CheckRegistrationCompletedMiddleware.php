<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class CheckRegistrationCompletedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth()->user()){
            if( isNull(auth()->user()->region) 
                && isNull(auth()->user()->province)
                && isNull(auth()->user()->city) 
                && isNull(auth()->user()->barangay) 
            ) { 
                //dd(auth()->user());
                // return redirect()->route('register.step2.create');
            }
            return $next($request);
        }

    }
}
