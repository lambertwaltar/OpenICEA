<?php

namespace Modules\Prescription\Entities;

use Illuminate\Database\Eloquent\Model;

class StockItem extends Model
{
    protected $fillable = [];
    protected $primaryKey = 'OID';
    protected $table = 'StockItem';
    public $timestamps = false;

    public function _drug()
    {
        return $this->belongsTo('Modules\Prescription\Entities\Drug', 'Drug');
    }

    public function _fundingsource()
    {
        return $this->belongsTo('Modules\Prescription\Entities\FundingSource', 'FundingSource');
    }

    public function _unitdescription()
    {
        return $this->belongsTo('Modules\Prescription\Entities\UnitDescription', 'UnitDescription');
    }

   	public function _location()
    {
        return $this->belongsTo('Modules\Prescription\Entities\Location', 'Location');
    }

    public function _unitofmeasurement()
    {
        return $this->belongsTo('Modules\Prescription\Entities\UnitOfMeasurement', 'UnitOfMeasurement');
    }

    public function _productgroup()
    {
        return $this->belongsTo('Modules\Prescription\Entities\ProductGroup', 'ProductGroup');
    }
    public function _condition()
    {
        return $this->belongsTo('Modules\Prescription\Entities\Condition', 'StorageCondition');
    }


}
