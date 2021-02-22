<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class Encounter extends Model
{
    protected $table = 'encounter';
    protected $primaryKey = 'OID';
    protected $fillable = ['Patient'];
    protected $foreignKey ='Patient';

    public function _patient()
    {
        return $this->belongsTo('Modules\Patient\Entities\Patient', 'Patient');
    }

    public function encounterreason()
    {
        return $this->belongsToMany('Modules\Patient\Entities\AppointmentType', 'appointment_encounter','encounter_OID','appointment_OID');
    }

    // public function returnappointmentreason()
    // {
    //     return $this->belongsTo('Modules\Patient\Entities\AppointmentType', 'Return_appointment_reason', 'OID');
    // }

    public function prescriptions()
    {
        return $this->hasMany('Modules\Patient\Entities\Prescription', 'Encounter', 'OID');
    }

    public function encountertriagedetail()
    {
        return $this->belongsTo('Modules\Patient\Entities\Triage', 'Encounter', 'OID')->latest();
    }

    public function encounterfsdetail()
    {
        return $this->belongsTo('Modules\Patient\Entities\FlowSheet', 'Encounter', 'OID')->latest();
    }


}
