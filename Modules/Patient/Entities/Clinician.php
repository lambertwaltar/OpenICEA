<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class Clinician extends Model
{
   	protected $table = 'Clinician';
    protected $primaryKey = 'OID';
    protected $fillable = [];
    public $timestamps = false;

    public function patients()
    {
        return $this->hasMany('Modules\Patient\Entities\Patient', 'Provider');
    }
}
