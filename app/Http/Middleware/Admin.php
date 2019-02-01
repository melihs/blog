<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     *
     * @return mixed
     */
    public function handle( $request, Closure $next )
    {
        if (Auth::check()) {
            $role = Auth::user()->role_id;
            switch ( $role ) {
                case 1:
                    {
                        return $next($request);
                    }
                    break;
                case 2 :
                    {
                        return $next($request);
                    }
                    break;
                case 3 :
                    {
                        return $next($request);
                    }
                    break;
                default :
                    return redirect('/');
            }
        }else{
            return redirect('/');
        }
    }
}
