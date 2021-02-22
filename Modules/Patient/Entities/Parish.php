<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class Parish extends Model
{
    protected $table = 'Parish';
    protected $primaryKey = 'OID';
    protected $fillable = [];

    public function patients()
    {
        return $this->hasMany('Modules\Patient\Entities\Patient', 'Parish', 'OID');
    }

    public function _subcounty()
    {
        return $this->belongsTo('Modules\Patient\Entities\Subcounty', 'SubCounty');
    }

    public function villages()
    {
        return $this->hasMany('Modules\Patient\Entities\Village', 'Parish', 'OID');
    }
}
