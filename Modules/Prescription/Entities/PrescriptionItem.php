<?php

namespace Modules\Prescription\Entities;

use Illuminate\Database\Eloquent\Model;

class PrescriptionItem extends Model
{
    protected $fillable = [];
    protected $primaryKey = 'OID';
    protected $table = 'prescriptionItem';

    public function piprescription()
    {
        return $this->belongsTo('Modules\Prescription\Entities\Prescription', 'Prescription');
    }

    public function pidrug()
    {
        return $this->belongsTo('Modules\Prescription\Entities\Drug', 'Drug');
    }

    public function pischedule()
    {
        return $this->belongsTo('Modules\Prescription\Entities\Schedule', 'Schedule');
    }

    public function pidunit()
    {
        return $this->belongsTo('Modules\Prescription\Entities\Store', 'DispensingUnit');
    }

    public function pistock()
    {
        return $this->belongsTo('Modules\Prescription\Entities\StockItem', 'StockItem');
    }
}
