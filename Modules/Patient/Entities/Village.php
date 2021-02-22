<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $table = 'Village';
    protected $primaryKey = 'OID';
    protected $fillable = [];

    public function patients()
    {
        return $this->hasMany('Modules\Patient\Entities\Patient', 'Village');
    }

    public function _parish()
    {
        return $this->belongsTo('Modules\Patient\Entities\Parish', 'Parish');
    }
}
