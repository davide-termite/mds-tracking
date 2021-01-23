<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Reception
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
        if ( ! Auth::check()) {
            abort(403, 'Non hai i permessi necessari per accedere qui!');
        }

        if ( Auth::user()->flag_reception === 1) {
            return $next($request);
        }   else    {
            $tracker = Auth::user()->tracker;      
            return response()->view("dashboard", compact('tracker'));
        }
            
    }
}
