<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //protected $dateFormat = 'd/m/Y';
    protected $foreignKey ='Country';
    protected $table = 'patient';
    protected $primaryKey = 'IDCNO';
    protected $fillable = ['RegistrationDate','FirstName','Surname','Initial','Gender','MaritalStatus','FollowUpStatus', 'Country'];


    public function countryy()
    {
        return $this->belongsTo('Modules\Patient\Entities\Country', 'Country');
    }


    public function _district()
    {
        return $this->belongsTo('Modules\Patient\Entities\District', 'District');
    }

    public function _county()
    {
        return $this->belongsTo('Modules\Patient\Entities\County', 'County');
    }

    public function _subcounty()
    {
        return $this->belongsTo('Modules\Patient\Entities\Subcounty', 'SubCounty');
    }

    public function _parish()
    {
        return $this->belongsTo('Modules\Patient\Entities\Parish', 'Parish');
    }

    public function _village()
    {
        return $this->belongsTo('Modules\Patient\Entities\Village', 'Village');
    }

    public function _kccaclinic()
    {
        return $this->belongsTo('Modules\Patient\Entities\KCCAClinic');
    }

    public function _religion()
    {
        return $this->belongsTo('Modules\Patient\Entities\Religion', 'Religion');
    }

    public function _chartlocation()
    {
        return $this->belongsTo('Modules\Patient\Entities\ChartLocation');
    }

    public function _referral()
    {
        return $this->belongsTo('Modules\Patient\Entities\Referral');
    }

    public function _tribe()
    {
        return $this->belongsTo('Modules\Patient\Entities\Tribe', 'Tribe');
    }

    public function _provider()
    {
        return $this->belongsTo('Modules\Patient\Entities\Clinician');
    }
    
    public function _filedata()
    {
        return $this->hasOne('Modules\Patient\Entities\FileData','Patient','IDCNO');
    }

    public function phones()
    {
        return $this->hasMany('Modules\Patient\Entities\Phonedetail', 'Patient', 'IDCNO');
    }

    public function encounters()
    {
        return $this->hasMany('Modules\Patient\Entities\Encounter', 'Patient', 'IDCNO')->orderBy('visitDate', 'desc');
    }

    public function patienttriagedetail()
    {
        return $this->belongsTo('Modules\Patient\Entities\Triage')->latest();
    }

    public function patientfsdetail()
    {
        return $this->hasMany('Modules\Patient\Entities\FlowSheet','Patient','IDCNO')->orderBy('TriageDate', 'desc')->take(1);
    }


    public function returnappointment()
    {
        return $this->hasOne('Modules\Patient\Entities\Appointment','Patient','IDCNO');
    }

}
