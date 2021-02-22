<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    
    protected $table = 'country';
    protected $primaryKey = 'OID';
    protected $fillable = ['Name'];

    public function patients()
    {
        return $this->hasMany('Modules\Patient\Entities\Patient', 'Country', 'OID');
    }

    public function districts()
    {
        return $this->hasMany('Modules\Patient\Entities\District', 'Country', 'OID');
    }
}

