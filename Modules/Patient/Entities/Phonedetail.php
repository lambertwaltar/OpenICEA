<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class Phonedetail extends Model
{
    protected $fillable = [];
    protected $table ='PhoneDetails';
    protected $primaryKey = 'OID';


    public function patient()
    {
        return $this->belongsTo('Modules\Patient\Entities\Patient', 'Patient');
    }
}
