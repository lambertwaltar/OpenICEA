<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = 'userroles';
    protected $fillable = ['RoleName'];
    protected $primaryKey = 'OID';
    public $timestamps = false;


    //create relationship method with Roles
    //add pivot table as second argument
    //third argument is the foreign key name of this model
    //fourth argument is the foreign key name of other model
    public function users()
    {
        return $this->belongsToMany('Modules\User\Entities\User', 'role_user', 'role_oid', 'user_oid'); 
    }



}
