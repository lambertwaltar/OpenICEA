<?php

namespace Modules\Prescription\Entities;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
	protected $table = 'prescription';
    protected $primaryKey = 'OID';
    protected $fillable = [];

    public function prescriptionitems()
    {
        return $this->hasMany('Modules\Prescription\Entities\PrescriptionItem', 'Prescription', 'OID');
    }

    public function pencounter()
    {
        return $this->belongsTo('Modules\Patient\Entities\Encounter', 'Encounter');
    }

    public function ppatient()
    {
        return $this->belongsTo('Modules\Patient\Entities\Patient', 'Patient');
    }

    public function pregimen()
    {
        return $this->belongsTo('Modules\Prescription\Entities\Regimen', 'ArtRegimen');
    }

    public function pprovider()
    {
        return $this->belongsTo('Modules\User\Entities\User', 'Provider');
    }
}
