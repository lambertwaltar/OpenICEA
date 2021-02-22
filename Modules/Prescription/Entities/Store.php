<?php

namespace Modules\Prescription\Entities;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'store';
    protected $primaryKey = 'OID';
    protected $fillable = [];


	public function location()
    {
    	return $this->belongsTo('Modules\Prescription\Entities\Location', 'Store');

    }


}