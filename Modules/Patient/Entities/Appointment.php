<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [];
    protected $table = 'appointments';
    protected $primaryKey = 'OID';

    public function appointmentpatient()
    {
        return $this->belongsTo('Modules\Patient\Entities\Patient', 'Patient');
    }

    public function appointmentreason()
    {
        return $this->belongsToMany('Modules\Patient\Entities\AppointmentType', 'appointments_reason','appointments_OID','reason_OID');
    }
}
