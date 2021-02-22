<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{

    use HasRoles;
    use Notifiable;
    
    protected $table = 'users';
    protected $fillable = ['username', 'password','FirstName','LastName','EmailAddress'];
    protected $primaryKey = 'OID';

    //create relationship method with Roles
    //add pivot table as second argument
    //third argument is the foreign key name of this model
    //fourth argument is the foreign key name of other model
    // public function roles()
    // {
    //     return $this->belongsToMany('Modules\User\Entities\Role', 'role_user', 'user_oid', 'role_oid');
    // }



}
