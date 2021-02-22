<?php

namespace Modules\Prescription\Entities;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [];
    protected $primaryKey = 'OID';
    protected $table = 'Location';


	public function stores()
    {
        return $this->belongsTo('Modules\Prescription\Entities\Store', 'Store', 'OID');
    }

    public function locationstockitem()
    {
        return $this->belongsTo('Modules\Prescription\Entities\StockItem');
    }

}
