<?php

namespace Modules\Prescription\Entities;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    protected $fillable = [];
    protected $primaryKey = 'OID';
    protected $table = 'Drug';

    public function regimen()
    {
        return $this->belongsToMany('Modules\Prescription\Entities\Regimen', 'drug_regimen','drug_OID','regimen_OID');
    }

    public function drugstockitem()
    {
        return $this->belongsTo('Modules\Prescription\Entities\StockItem');
    }
}
