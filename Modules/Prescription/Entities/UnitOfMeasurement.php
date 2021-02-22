<?php

namespace Modules\Prescription\Entities;

use Illuminate\Database\Eloquent\Model;

class UnitOfMeasurement extends Model
{
    protected $fillable = [];
    protected $primaryKey = 'OID';
    protected $table = 'UnitOfMeasurement';

    public function unitmeasurementstockitem()
    {
        return $this->belongsTo('Modules\Prescription\Entities\StockItem');
    }
}
