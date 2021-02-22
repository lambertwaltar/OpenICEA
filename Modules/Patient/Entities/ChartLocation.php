<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class ChartLocation extends Model
{
    protected $table = 'ChartLocation';
    protected $primaryKey = 'OID';
    protected $fillable = [];

    public function patients()
    {
        return $this->hasMany('Modules\Patient\Entities\Patient', 'ChartLocation');
    }
}
