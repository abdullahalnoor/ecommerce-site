<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function serviceDetails()
    {
        return $this->hasMany('App\ServiceDetail');
    }
}
