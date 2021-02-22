<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class AppointmentType extends Model
{
    protected $table = 'appointment_type';
    protected $primaryKey = 'OID';
    protected $fillable = [];

    public function _encounterreason()
    {
        return $this->belongsToMany('Modules\Patient\Entities\Encounter', 'appointment_encounter','appointment_OID','encounter_OID');
    }

    public function _returnappointmentreason()
    {
        return $this->belongsTo('Modules\Patient\Entities\Encounter', 'Return_appointment_reason');
    }

    public function _appointmentreason()
    {
        return $this->belongsToMany('Modules\Patient\Entities\Appointment', 'appointments_reason','appointments_OID','reason_OID');
    }
}
