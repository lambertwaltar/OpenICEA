<?php

namespace Modules\Laboratory\Entities;

use Illuminate\Database\Eloquent\Model;

class LabSampleCollection extends Model
{
    protected $fillable = [];
    protected $primaryKey = 'OID';
    protected $table = 'LabSampleCollection';

    public function lscpatient()
    {
       return $this->belongsTo('Modules\Patient\Entities\Patient', 'Patient');
    }

    public function lscprovider()
    {
        return $this->belongsTo('Modules\User\Entities\User', 'CollectedBy');
    }

    public function lscrequisition()
    {
        return $this->belongsTo('Modules\Laboratory\Entities\LabRequisition', 'LabRequisition');
    }
    public function lscencounter()
    {
        return $this->belongsTo('Modules\Patient\Entities\Encounter', 'Encounter');
    }
}
