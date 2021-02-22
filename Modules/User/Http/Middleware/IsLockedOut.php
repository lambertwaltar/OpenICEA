<?php

namespace Modules\User\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\User\Entities\User;
use Auth;
use Session;

class IsLockedOut
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->IsLockedOut =='0'){
            return $next($request);
        }
        toastr()->error('User Account is Locked');
        return redirect()->route('login')->withInput($request->except('password'));
        //return redirect()->back()->withInput($request->except('password'));
    }
}
