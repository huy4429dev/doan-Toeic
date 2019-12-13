<?php

namespace App\Http\Middleware;

use Closure;

class student
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
        if( !$request->session()->has('user')){
            return redirect()->route('student-logged')->with('error','You have not admin access');
        }
        return $next($request);
    }
}
