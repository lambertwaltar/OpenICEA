<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    protected $table = 'Religion';
    protected $primaryKey = 'OID';
    protected $fillable = [];

    public function patients()
    {
        return $this->hasMany('Modules\Patient\Entities\Patient', 'Religion', 'OID');
    }
}
