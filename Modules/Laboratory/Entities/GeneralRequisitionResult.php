<?php

namespace Modules\Laboratory\Entities;

use Illuminate\Database\Eloquent\Model;

class GeneralRequisitionResult extends Model
{
    protected $fillable = [];
    protected $primaryKey = 'OID';
    protected $table = 'GeneralRequisitionResult';

    public function grpatient()
    {
       return $this->belongsTo('Modules\Patient\Entities\Patient', 'Patient');
    }
     public function grencounter()
    {
       return $this->belongsTo('Modules\Patient\Entities\Encounter', 'Encounter');
    }

    public function grprovider()
    {
        return $this->belongsTo('Modules\User\Entities\User', 'TestedBy');
    }

    public function grrequisition()
    {
        return $this->belongsTo('Modules\Laboratory\Entities\LabRequisition', 'LabRequisition');
    }

    public function grsamplecollection()
    {
        return $this->belongsTo('Modules\Laboratory\Entities\LabSampleCollection', 'LabSampleCollection');
    }

}
