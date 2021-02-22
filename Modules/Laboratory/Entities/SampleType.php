<?php

namespace Modules\Laboratory\Entities;

use Illuminate\Database\Eloquent\Model;

class SampleType extends Model
{
    protected $fillable = [];
    protected $primaryKey = 'OID';
    protected $table = 'SampleType';

    public function labtests()
    {
        return $this->hasMany('Modules\Laboratory\Entities\LabTest', 'Sample', 'OID');
    }
}
