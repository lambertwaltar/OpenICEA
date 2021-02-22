<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class Tribe extends Model
{
    protected $table = 'Tribe';
    protected $primaryKey = 'OID';
    protected $fillable = [];

    public function patients()
    {
        return $this->hasMany('Modules\Patient\Entities\Patient', 'Tribe', 'OID');
    }
}
