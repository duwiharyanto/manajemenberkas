<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class ceklogin
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
        if(!Session::get('login')){
            return redirect('Login')->with('alerterror','Kamu harus login dulu');
        }else{
            return $next($request);
        }
    }
}
