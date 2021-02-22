<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class FlowSheet extends Model
{
    protected $table = 'flowsheet';
    protected $primaryKey = 'OID';
    protected $fillable = [];
	
	// protected $casts = [
        // 'OlsMalignancy' => 'array',
		// 'OtherClinicalEvent' => 'array',
		// 'ContraceptiveMethod' => 'array',
		// 'STIScreeningSymptom' => 'array',
		// 'Prophylaxis' => 'array',
		// 'NotStrartARVReason' => 'array',
		// 'Toxicity' => 'array',
		// 'SwitchReason' => 'array',
		// 'StopReason' => 'array',
		// 'HypertensionMedicine' => 'array',
		// 'DiabetesMedicine' => 'array',
	// ];

    public function fsencounter()
    {
        return $this->belongsTo('Modules\Patient\Entities\Encounter', 'Encounter');
    }

    public function fspatient()
    {
        return $this->belongsTo('Modules\Patient\Entities\Patient', 'Patient');
    }

    public function fsprovider()
    {
        return $this->belongsTo('Modules\User\Entities\User', 'Provider');
    }
	
	public function fsregimen()
    {
        return $this->belongsTo('Modules\Prescription\Entities\Regimen', 'Regimen');
    }
	
	public function fsdsdmtype()
    {
        return $this->belongsTo('Modules\Patient\Entities\DSDMType', 'DSDMType');
    }
	
	public function fsfundingsource()
    {
        return $this->belongsTo('Modules\Prescription\Entities\FundingSource', 'ARTSource');
    }
	
	
}
