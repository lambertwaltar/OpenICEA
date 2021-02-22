<?php

namespace Modules\Prescription\Entities;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    protected $fillable = [];
    protected $primaryKey = 'OID';
    protected $table = 'Condition';

    public function conditionstockitem()
    {
        return $this->belongsTo('Modules\Prescription\Entities\StockItem');
    }
    
}
