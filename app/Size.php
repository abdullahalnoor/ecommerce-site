<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public function productStock()
    {
        return $this->hasMany('App\ProductStock');
    }

}
