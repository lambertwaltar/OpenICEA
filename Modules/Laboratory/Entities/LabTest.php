<?php

namespace Modules\Laboratory\Entities;

use Illuminate\Database\Eloquent\Model;

class LabTest extends Model
{
    protected $fillable = [];
    protected $primaryKey = 'OID';
    protected $table = 'LabTest';

    public function labsample()
    {
        return $this->belongsTo('Modules\Laboratory\Entities\SampleType','Sample');
    }

    public function _requisitiontest()
    {
        return $this->belongsToMany('Modules\Laboratory\Entities\LabRequisition', 'LabRequisitionLabTest','LabTest','LabRequisition');
    }
}
