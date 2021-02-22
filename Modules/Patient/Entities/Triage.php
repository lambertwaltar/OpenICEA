<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class Triage extends Model
{
    protected $table = 'triage';
    protected $primaryKey = 'OID';
    protected $fillable = [];

    public function triageencounter()
    {
        return $this->belongsTo('Modules\Patient\Entities\Encounter', 'Encounter');
    }

    public function triagepatient()
    {
        return $this->belongsTo('Modules\Patient\Entities\Patient', 'Patient');
    }

    public function triageprovider()
    {
        return $this->belongsTo('Modules\User\Entities\User', 'Provider');
    }
}
