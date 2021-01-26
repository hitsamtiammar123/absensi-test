<?php

namespace App\Http\Middleware;

use Closure;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $type = 'admin')
    {
        $user = \Auth::user();
        if($user){
            if(
                ($type === 'admin' && $user->isAdmin()) ||
                ($type === 'employee' && $user->isEmployee())
            ){
                return $next($request);
            }
        }
        return redirect(route('index'));
    }
}
