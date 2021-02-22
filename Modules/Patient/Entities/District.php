<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'District';
    protected $primaryKey = 'OID';
    protected $fillable = ['Name','Country'];

    public function patients()
    {
        return $this->hasMany('Modules\Patient\Entities\Patient', 'District', 'OID');
    }

    public function dcountry()
    {
    	return $this->belongsTo('Modules\Patient\Entities\Country', 'Country');

    }

    public function counties()
    {
        return $this->hasMany('Modules\Patient\Entities\County', 'District', 'OID');
    }
}
