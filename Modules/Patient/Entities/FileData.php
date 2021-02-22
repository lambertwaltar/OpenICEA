<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

class FileData extends Model
{
    protected $table = 'FileData';
    protected $primaryKey = 'OID';
    protected $fillable = [];

    public function fdpatient()
    {
        return $this->belongsTo('Modules\Patient\Entities\Patient', 'Patient');
    }
}
