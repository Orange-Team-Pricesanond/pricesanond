<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class CheckLevel
{
    public function handle($request, Closure $next)
    {
        if(Session::get('Mem_level') != "admin"){
            return redirect('login');
        }else{
            return $next($request);
        }
    }
}
