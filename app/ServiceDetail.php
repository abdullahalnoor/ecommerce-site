<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceDetail extends Model
{
    public function service()
    {
        return $this->belongsTo('App\Service','service_id');
    }
}
