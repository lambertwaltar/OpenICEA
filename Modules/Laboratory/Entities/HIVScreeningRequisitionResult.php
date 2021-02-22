<?php

namespace Modules\Laboratory\Entities;

use Illuminate\Database\Eloquent\Model;

class HIVScreeningRequisitionResult extends Model
{
	protected $fillable = [];
    protected $primaryKey = 'OID';
    protected $table = 'HIVScreeningRequisitionResult';

    public function hivpatient()
    {
       return $this->belongsTo('Modules\Patient\Entities\Patient', 'Patient');
    }
     public function hivencounter()
    {
       return $this->belongsTo('Modules\Patient\Entities\Encounter', 'Encounter');
    }

    public function hivprovider()
    {
        return $this->belongsTo('Modules\User\Entities\User', 'TestedBy');
    }

    public function hivrequisition()
    {
        return $this->belongsTo('Modules\Laboratory\Entities\LabRequisition', 'LabRequisition');
    }

    public function hivsamplecollection()
    {
        return $this->belongsTo('Modules\Laboratory\Entities\LabSampleCollection', 'LabSampleCollection');
    }
}
