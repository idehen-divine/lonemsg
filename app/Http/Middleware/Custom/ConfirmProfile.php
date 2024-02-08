<?php

namespace App\Http\Middleware\Custom;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfirmProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
		if(auth()->guard('user')->user()->profile != null){
			return $next($request);
		}else{
			return redirect(route('user.profile'));
		}
    }
}
