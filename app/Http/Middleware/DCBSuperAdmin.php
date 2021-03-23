<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class DCBSuperAdmin
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
        $auth=Auth::user();
        if ($auth->SuperAdminRole->id == 1){
            return $next($request);
        }else{
            Auth::logout();
            // return redirect('/');
            return redirect('/superadmin/login');
        }
//        return $next($request);
    }
}
