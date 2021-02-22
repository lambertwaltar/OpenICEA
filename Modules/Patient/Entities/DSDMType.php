<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class DSDMType extends Model
{
    protected $table = 'DSDMType';
    protected $primaryKey = 'OID';
    protected $fillable = [];
	
	public function dsdmtypefs()
    {
        return $this->belongsTo('Modules\Patient\Entities\FlowSheet', 'DSDMType', 'OID')->latest();
    }
	
}
