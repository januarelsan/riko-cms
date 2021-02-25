<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnsureAccountIsActive
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
        
        // if they have a key...
        if (!Auth::user()->isActivated()) {
            // then redirect home cause they're not activated
            // return redirect('view.inactive-account');            
            return response()->view('inactive-account');
        }
    
        return $next($request);
    }
}
