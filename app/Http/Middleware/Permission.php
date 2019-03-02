<?php

namespace App\Http\Middleware;

use Closure;

class Permission
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
        if(\Auth::check())
        {
            $userRole= \Auth::user()->pengguna->userrole->role_id;

            if($userRole == '1')
            {
                return redirect('/jurusan');
            }elseif($userRole == '2'){

              return redirect('/grupkelas');
            }
        }
        return $next($request);
    }
}
