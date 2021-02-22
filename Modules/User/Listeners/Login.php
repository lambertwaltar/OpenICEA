<?php

namespace Modules\User\Listeners;

use Modules\User\Events\SuccessfulLogin;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\User\Entities\User;
use DB;
Use Request;
use Carbon\Carbon;

class Login
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param SuccessfulLogin $event
     * @return void
     */
    public function handle(SuccessfulLogin $event)
    {
        DB::table('users') ->where('username', request()->username) ->update(['LastloginDate' => Carbon::now(),'LastActivityDate' => Carbon::now()]);
    }
}


