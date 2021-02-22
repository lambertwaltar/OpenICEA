<?php

namespace Modules\Prescription\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    protected $fillable = [];
    protected $primaryKey = 'OID';
    protected $table = 'ProductGroup';

    public function productgrouptockitem()
    {
        return $this->belongsTo('Modules\Prescription\Entities\StockItem');
    }
    
}
