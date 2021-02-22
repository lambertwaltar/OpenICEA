<?php

namespace Modules\Prescription\Entities;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [];
    protected $primaryKey = 'OID';
    protected $table = 'Schedule';
    
}
