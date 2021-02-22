<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class Subcounty extends Model
{
    protected $table = 'SubCounty';
    protected $primaryKey = 'OID';
    protected $fillable = [];

    public function patients()
    {
        return $this->hasMany('Modules\Patient\Entities\Patient', 'SubCounty','OID');
    }

    public function _county()
    {
        return $this->belongsTo('Modules\Patient\Entities\County', 'County');
    }

    public function parishes()
    {
        return $this->hasMany('Modules\Patient\Entities\Parish', 'SubCounty', 'OID');
    }

}
