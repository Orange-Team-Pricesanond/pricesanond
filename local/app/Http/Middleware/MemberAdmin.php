<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class MemberAdmin
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
        if(empty(Auth::user()->id)){
            // return redirect('/login2');
			return redirect()->route('/login2');
		}else{
			return $next($request);
		}
    }
}
