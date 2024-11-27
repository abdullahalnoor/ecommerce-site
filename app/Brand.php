<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function brandProducts()
    {
        return $this->hasMany('App\BrandProduct');
    }
}
