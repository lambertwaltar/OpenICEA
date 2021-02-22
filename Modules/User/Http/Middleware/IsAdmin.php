<?php

namespace Modules\User\Http\Middleware;
use Modules\User\Entities\User;
use Auth;
use Closure;
use Session;
use Illuminate\Http\Request;

class IsAdmin
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

    
    //======================test
    public function handle($request, Closure $next)
    {

        if (Auth::user()->username=='admin' || Auth::user()->can('administrator'))
        {
            return $next($request);
        } 
        
        toastr()->error('Administrator Privilleges required');
        return redirect()->back(); 
        //Session::flash('error',"Administrator Privilleges required.");
        //return Redirect::back()->withInput($request->except('password')); //
        //return redirect()->back()->with('error','Administrator Privilleges required.');
    }
   
}
