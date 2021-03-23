<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class DCBSubadmin
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
        $auth=Auth::user();
        if ($auth->SuperAdminRole->id == 3){
            return $next($request);
        }else{
            Auth::logout();
            // return redirect('/');
            return redirect('/superadmin/login');
        }
    }
}
