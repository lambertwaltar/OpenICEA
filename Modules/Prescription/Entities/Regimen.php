<?php

namespace Modules\Prescription\Entities;

use Illuminate\Database\Eloquent\Model;

class Regimen extends Model
{
    protected $fillable = [];
    protected $primaryKey = 'OID';
    protected $table = 'regimen';

    public function drugs()
    {
        return $this->belongsToMany('Modules\Prescription\Entities\Drug', 'drug_regimen','regimen_OID','drug_OID');
    }
	
	public function flowsheetregimen()
    {
        return $this->belongsTo('Modules\Patient\Entities\FlowSheet', 'Regimen', 'OID')->latest();
    }
}	
