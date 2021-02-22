<?php

namespace Modules\Prescription\Entities;

use Illuminate\Database\Eloquent\Model;

class FundingSource extends Model
{
    protected $fillable = [];
    protected $primaryKey = 'OID';
    protected $table = 'FundingSource';

    public function fundingsourcestockitem()
    {
        return $this->belongsTo('Modules\Prescription\Entities\StockItem');
    }
	
	public function fundingsourcefs()
    {
        return $this->belongsTo('Modules\Patient\Entities\FlowSheet', 'ARTSource', 'OID')->latest();
    }
}
