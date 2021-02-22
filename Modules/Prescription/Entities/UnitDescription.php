<?php

namespace Modules\Prescription\Entities;

use Illuminate\Database\Eloquent\Model;

class UnitDescription extends Model
{
    protected $fillable = [];
    protected $primaryKey = 'OID';
    protected $table = 'UnitDescription';

    public function unitdescriptionstockitem()
    {
        return $this->belongsTo('Modules\Prescription\Entities\StockItem');
    }
}
