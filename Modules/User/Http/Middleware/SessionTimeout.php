<?php

namespace Modules\User\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Session;
use Carbon\Carbon;

class SessionTimeout
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
    public function handle($request, Closure $next)
  {

    if ((time() - Session::activity()) > (Config::get('session.lifetime') * 60))
        {
           // Session expired
            return Redirect("/")->withSuccess('Loged out due to inactivity'); // 
        }


     /*   if (!Auth::check()) {
              return $next($request);
            }
         
            $user = Auth::guard()->user();
         
            $now = Carbon::now();

         
            $last_seen = Carbon::parse($user->LastActivityDate);
         
            $absence = $now->diffInMinutes($last_seen);
            //dd(config('session.lifetime'));
         
            // If user has been inactivity longer than the allowed inactivity period
            if ($absence > config('session.lifetime')) {
                    Auth::guard()->logout();
             
                    $request->session()->invalidate();
             
                    return $next($request);
            }
         
            $user->LastActivityDate = $now->format('Y-m-d H:i:s');
            $user->save();
         
            return $next($request);






        
       if ((time() - Session::activity()) > config('session.lifetime') ))
        {  
            $request->session()->flush();
            Session::flush();            
            Auth::logout(); // logout user
            return Redirect("/")->withSuccess('Loged out due to inactivity'); // 
            
        }
 
        return $next($request);
  
*/

  }
}
