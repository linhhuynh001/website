<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAuthHome
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
        if(Auth::user()->status == 1){
            return back()->with('error','NO');
        }
        return $next($request);
    }
}
