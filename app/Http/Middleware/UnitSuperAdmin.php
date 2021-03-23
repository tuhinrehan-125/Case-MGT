<?php

namespace App\Http\Middleware;

use App\Models\UnitRole;
use Closure;
use Illuminate\Support\Facades\Auth;

class UnitSuperAdmin
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
        if ($auth->UnitRole->name == 'super-admin'){
            return $next($request);
        }else{

            return redirect('/');
        }
    }
}
