<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $table = 'Referral';
    protected $primaryKey = 'OID';
    protected $fillable = [];

    public function patients()
    {
        return $this->belongsTo('Modules\Patient\Entities\Patient', 'IDPhoto');
    }
}
