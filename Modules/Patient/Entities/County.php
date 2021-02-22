<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $table = 'County';
    protected $primaryKey = 'OID';
    protected $fillable = [];

    public function patients()
    {
        return $this->hasMany('Modules\Patient\Entities\Patient', 'County');
    }


    public function _district()
    {
    	return $this->belongsTo('Modules\Patient\Entities\District', 'District');

    }

     public function subcounties()
    {
        return $this->hasMany('Modules\Patient\Entities\Subcounty', 'County', 'OID');
    }
}
