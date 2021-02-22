<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class KCCAClinic extends Model
{
    protected $table = 'KCCAClinic';
    protected $primaryKey = 'OID';
    protected $fillable = [];

    public function patients()
    {
        return $this->hasMany('Modules\Patient\Entities\Patient', 'KCCAClinic');
    }
}
