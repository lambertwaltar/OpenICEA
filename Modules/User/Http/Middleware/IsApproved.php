<?php

namespace Modules\User\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\User\Entities\User;
use Auth;
use Session;

class IsApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    function dd($data){
    echo '<pre>';
    die(var_dump($data));
    echo '</pre>';
    }

    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->IsApproved =='1'){
            return $next($request);
        }
        toastr()->error('User Account Pending Approval');
        return redirect()->route('login')->withInput($request->except('password'));
        //Session::flash('error',"User Account Pending Approval.");
        //return Redirect::back()->withInput($request->except('password')); //
        //return redirect()->route('login')->withInput($request->except('password'));
    }
}
