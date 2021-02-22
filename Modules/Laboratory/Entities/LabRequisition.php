<?php

namespace Modules\Laboratory\Entities;

use Illuminate\Database\Eloquent\Model;

class LabRequisition extends Model
{
    protected $fillable = [];
    protected $primaryKey = 'OID';
    protected $table = 'LabRequisition';

    public function requisitiontest()
    {
        return $this->belongsToMany('Modules\Laboratory\Entities\LabTest', 'LabRequisitionLabTest','LabRequisition','LabTest');
    }

    public function rpatient()
    {
       return $this->belongsTo('Modules\Patient\Entities\Patient', 'Patient');
    }

    public function rprovider()
    {
        return $this->belongsTo('Modules\User\Entities\User', 'OrderedBy');
    }

    public function rencounter()
    {
        return $this->belongsTo('Modules\Patient\Entities\Encounter', 'Encounter');
    }

    public function _lscprovider()
    {
        return $this->belongsTo('Modules\Laboratory\Entities\LabSampleCollection', 'CollectedBy', 'OID');
    }

    public function _grrequisition()
    {
        return $this->belongsTo('Modules\Laboratory\Entities\GeneralRequisitionResult','OID','LabRequisition');
    }

    public function _lscrequisition()
    {
        return $this->belongsTo('Modules\Laboratory\Entities\LabSampleCollection','OID', 'LabRequisition');
    }
}
